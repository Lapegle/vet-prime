<template>
    <progress class="progress progress-accent w-56" :max="max" :value="value"></progress>
</template>

<script setup>
defineProps({
    max: {
        type: Number,
        required: true
    },
    value: {
        type: Number,
        required: true
    }
})
</script>
