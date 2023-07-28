<template>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Phone</th>
                <th scope="col">Time to start</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in schedulesList">
                <th scope="row">{{ item._id }}</th>
                <td>{{ item.phone_number }}</td>
                <td><timer :endTime="item.time" @emit-finish="timerCheck"></timer></td>
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
                schedulesList: {}
            }
        },
        methods: {
            loadData() {
                const self = this;
                axios.get(self.route)
                    .then(function (response) {
                        self.schedulesList = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            timerCheck(timerIsWorking) {
                if (!timerIsWorking) {
                    this.loadData();
                }
            }
        },
        async mounted() {
            this.loadData();
        }
    }
</script>
