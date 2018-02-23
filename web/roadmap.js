





Vue.component('cat-item', {
    template: '<div>{{ "-".repeat(level) }}{{ title }}</div>',
    props: ['title', 'level']
});

Vue.component('operation', {
    template: '<div>{{ title }}</div>',
    props: ['title']
});

new Vue({
    el: '#roadmap',
    data: {
        operations: [],
        categories: [],
        roadmap: {steps: [
                {

                }
            ]}
    },
    methods: {
        load() {
            this.categories = JSON.parse(this.$refs.categories.dataset.json);
            this.operations = JSON.parse(this.$refs.operations.dataset.json);
        }
    },
    mounted() {
        this.load()
    },
});