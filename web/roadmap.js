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
        steps: {},
        actions: 1,
        total: 0
    },
    methods: {
        load() {
            this.categories = JSON.parse(this.$refs.categories.dataset.json);
            this.operations = JSON.parse(this.$refs.operations.dataset.json);
            this.steps = JSON.parse(this.$refs.roadmap.dataset.json);

            // console.log(this.steps[1]);
        },
        actionCount: function (i) {
            this.total++;
            return this.total;
        }
    },
    mounted() {
        this.load()
    },
});