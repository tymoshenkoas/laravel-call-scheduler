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
import axios from 'axios';

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
                const dateObj = new Date(datetimeStr);
                const year = dateObj.getFullYear();
                let month = dateObj.getMonth() + 1;
                if (month < 10) {
                    month = "0" + month;
                }
                let date = dateObj.getDate();
                if (date < 10) {
                    date = "0" + date;
                }
                let hours = dateObj.getHours();
                if (hours < 10) {
                    hours = '0' + hours;
                }
                let minutes = dateObj.getMinutes();
                if (minutes < 10) {
                    minutes = '0' + minutes;
                }
                let seconds = dateObj.getSeconds();
                if (seconds < 10) {
                    seconds = '0' + seconds;
                }

                return year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;
            }
        },
        async mounted() {
            this.loadData();
        }
    }
</script>
