<template>
    <div class="flex flex-col space-y-1">
        <label>{{ label }}</label>
        <textarea
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="textarea textarea-accent"
        >
    </textarea>
    </div>

</template>


<script setup>
defineProps({
    label: {
        type: String,
        default: ''
    },
    modelValue: {
        type: String,
        default: ''
    }
});
</script>
