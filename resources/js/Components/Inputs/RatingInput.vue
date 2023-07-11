<template>
    <div class="rating">
        <input
            type="radio"
            name="rating-4"
            class="rating-hidden"
            value="0"
            :checked="0 === modelValue"
            @input="$emit('update:modelValue', Number($event.target.value))"
            checked
        />
        <input
            v-for="value in stars"
            @input="$emit('update:modelValue', Number($event.target.value))"
            :value="value"
            :checked="value === modelValue"
            type="radio"
            name="rating-4"
            class="mask mask-star-2 bg-accent"
        />
    </div>
</template>

<script setup>
const props = defineProps({
    stars: {
        type: Number,
        default: 5
    },
    modelValue: {
        type: Number,
        default: 0
    }
});
</script>
