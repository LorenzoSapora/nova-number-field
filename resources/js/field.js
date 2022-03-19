Nova.booting((Vue, router, store) => {
    Vue.component('index-numbered-field', require('./components/IndexField'))
    Vue.component('detail-numbered-field', require('./components/DetailField'))
    Vue.component('form-numbered-field', require('./components/FormField'))
})
