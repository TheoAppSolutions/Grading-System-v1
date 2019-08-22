<template>
    <div class="x_panel">
        <div class="x_title">
            <slot name="title"></slot>
            <slot name="sidetools">
            </slot>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <slot name="content"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "x-panel"
    };
</script>

<style scoped>

</style>
