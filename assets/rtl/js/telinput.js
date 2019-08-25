let telInput = $("#phone")

// initialize
telInput.intlTelInput({
    initialCountry: 'sa',
    preferredCountries: ['sa','ae','kw','bh'],
    autoPlaceholder: 'aggressive',
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"
})

let telInput2 = $("#phone2")

// initialize
telInput2.intlTelInput({
    initialCountry: 'sa',
    preferredCountries: ['sa','ae','kw','bh'],
    autoPlaceholder: 'aggressive',
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"
})