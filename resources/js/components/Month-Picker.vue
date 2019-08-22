<template>
    <select class="form-control month-picker">
        <option v-for="m in 12" :value="m" :selected="current(m)">{{ timestamp(m) }}</option>
    </select>
</template>

<script>
    export default {
        props: ['schoolyear', 'month'],
        name: "month-picker",
        methods: {
            timestamp: function (month_count) {
                return window.Moment(month_count, 'MM').format('MMMM');
            },
            current: function (month_count) {
                return month_count.toString() === this.month.toString() ? 'selected' : '';
            },
        }
    }
</script>

<style scoped>

</style>
