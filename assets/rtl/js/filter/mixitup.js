/////////////// mixitup

var mixer = mixitup('.product_list');



var container = document.querySelector('[data-ref="product_list"]');
var inputSearch = document.querySelector('[data-ref="input-search"]');
var keyupTimeout;

var mixer = mixitup(container, {
    animation: {
        duration: 350
    },
    callbacks: {
        onMixClick: function () {
            // Reset the search if a filter is clicked

            if (this.matches('[data-filter]')) {
                inputSearch.value = '';
            }
        }
    }
});

// Set up a handler to listen for "keyup" events from the search input

inputSearch.addEventListener('keyup', function () {
    var searchValue;

    if (inputSearch.value.length < 3) {
        // If the input value is less than 3 characters, don't send

        searchValue = '';
    } else {
        searchValue = inputSearch.value.toLowerCase().trim();
    }

    // Very basic throttling to prevent mixer thrashing. Only search
    // once 350ms has passed since the last keyup event

    clearTimeout(keyupTimeout);

    keyupTimeout = setTimeout(function () {
        filterByString(searchValue);
    }, 350);
});

/**
 * Filters the mixer using a provided search string, which is matched against
 * the contents of each target's "class" attribute. Any custom data-attribute(s)
 * could also be used.
 *
 * @param  {string} searchValue
 * @return {void}
 */

function filterByString(searchValue) {
    if (searchValue) {
        // Use an attribute wildcard selector to check for matches

        mixer.filter('[class*="' + searchValue + '"]');
    } else {
        // If no searchValue, treat as filter('all')

        mixer.filter('all');
    }
}
var containerEl = document.querySelector('.product_list');

var mixer = mixitup(containerEl);

function handleTargetClick(e) {
    var targetEl;

    if (!(targetEl = e.target).matches('.mix')) {
        // If clicked element is not a target, return

        return;
    }

    // Pass the reference to the target element to the remove method

    mixer.remove(targetEl);
}

containerEl.addEventListener('click', handleTargetClick);








