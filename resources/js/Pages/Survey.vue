<template>
    <div class="h-screen bg-[url('/images/survey-background.jpg')] bg-cover flex justify-center items-center">
        <div
            class="mx-auto w-full max-w-[750px] flex justify-center py-2 shadow-2xl rounded bg-white">
            <div class="w-5/6">
                <h1 class="text-center text-3xl">{{ props.sentSurvey.survey.title }}</h1>
                <div v-if="currentQuestion">
                    <div class="flex flex-col justify-center space-y-3">
                        <div class="flex flex-col space-y-2">
                            <p>{{ currentQuestion.question_text }}</p>
                            <RatingInput v-model="currentQuestion.rating" class="item-right"/>
                        </div>
                        <div class="flex justify-center">
                            <TextareaInput
                                v-model="currentQuestion.answer"
                                label="Pastāstiet sīkāk"
                                class="w-full"
                            />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-center mt-10">
                            <ProgressBar
                                :value="currentQuestionIndex"
                                :max="props.sentSurvey.survey.questions.length"
                                class="w-full"
                            />
                        </div>

                        <div class="flex justify-end">
                            <div class="space-x-2">
                                <button :class="['btn btn-square', { 'btn-disabled': !hasPreviousQuestion }]"
                                        @click="previousQuestion">
                                    &lt;
                                </button>
                                <button :class="['btn btn-square', { 'btn-disabled': !hasNextQuestion }]"
                                        @click="nextQuestion">
                                    >
                                </button>
                                <button :class="['btn btn-primary', { 'btn-disabled': hasNextQuestion }]"
                                        @click="submitSurvey">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>


                </div>

                <div v-else>
                    <p>Survey completed! Thank you.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, computed} from 'vue';
import TextareaInput from "../Components/Inputs/TextareaInput.vue";
import RatingInput from "../Components/Inputs/RatingInput.vue";
import ProgressBar from "../Components/Survey/ProgressBar.vue";

const props = defineProps({
    sentSurvey: Object,
})

const currentQuestionIndex = ref(0);
const currentQuestion = computed(() => props.sentSurvey.survey.questions[currentQuestionIndex.value]);

const hasPreviousQuestion = computed(() => currentQuestionIndex.value > 0);
const hasNextQuestion = computed(() => currentQuestionIndex.value < props.sentSurvey.survey.questions.length - 1);

function previousQuestion() {
    currentQuestionIndex.value--;
}

function nextQuestion() {
    currentQuestionIndex.value++;
}
</script>
