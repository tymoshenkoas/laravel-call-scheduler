<template>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Phone</th>
                <th scope="col">Was called at</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in archiveList">
                <th scope="row">{{ item._id }}</th>
                <td>{{ item.phone_number }}</td>
                <td>{{ transformDate(item.time) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
            route: String
        },
        data() {
            return {
                archiveList: {}
            }
        },
        methods: {
            loadData() {
                const self = this;
                axios.get(self.route)
                    .then(function (response) {
                        self.archiveList = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            transformDate(datetimeStr) {
                return moment(datetimeStr).format('YYYY-MM-DD hh:mm');
            }
        },
        async mounted() {
            this.loadData();
        }
    }
</script>
