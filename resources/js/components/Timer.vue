<template>
    <div>{{ timerOutput }}</div>
</template>

<script>
    export default {
        props: {
            endTime: String
        },
        data() {
            return {
                timerOutput: "",
                intervalFunction: null
            }
        },
        methods: {
            startTimer() {
                const timeNow = new Date().getTime();
                const endTime = new Date(this.endTime).getTime();
                const timeDifference = endTime - timeNow;
                if (timeDifference > 0) {
                    const millisecondsInOneSecond = 1000;
                    const millisecondsInOneMinute = millisecondsInOneSecond * 60;
                    const millisecondsInOneHour = millisecondsInOneMinute * 60;
                    const remainderDifferenceInHours = timeDifference / millisecondsInOneHour;
                    const remainderDifferenceInMinutes = (timeDifference % millisecondsInOneHour) / millisecondsInOneMinute;
                    const remainderDifferenceInSeconds = (timeDifference % millisecondsInOneMinute) / millisecondsInOneSecond;
                    let remainingHours = Math.floor(remainderDifferenceInHours);
                    if (remainingHours < 10) {
                        remainingHours = '0' + remainingHours;
                    }
                    let remainingMinutes = Math.floor(remainderDifferenceInMinutes);
                    if (remainingMinutes < 10) {
                        remainingMinutes = '0' + remainingMinutes;
                    }
                    let remainingSeconds = Math.floor(remainderDifferenceInSeconds);
                    if (remainingSeconds < 10) {
                        remainingSeconds = '0' + remainingSeconds;
                    }
                    this.timerOutput = remainingHours + ":" + remainingMinutes + ":" + remainingSeconds;
                } else {
                    clearInterval(this.intervalFunction);
                    this.$emit("emit-finish", false)
                }
            }
        },
        mounted() {
            this.intervalFunction = setInterval(() => { this.startTimer() }, 1000);
        }
    }
</script>
