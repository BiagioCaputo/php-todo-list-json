const { createApp } = Vue;

const endpoint = 'http://localhost/boolean/php-todo-list-json/api/tasks/';

const app = createApp({
    data: () => ({
        tasks: [],
        newTask: '',
    }),

    methods: {
        addTask() {
            const data = {
                task: {
                    id: new Date().toISOString(),
                    text: this.newTask,
                    done: false
                }
            };
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
                this.newTask = '';
            })
        }
    },

    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        })
    }
})

app.mount('#app');
