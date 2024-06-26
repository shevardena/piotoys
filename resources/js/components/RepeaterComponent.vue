<template>
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2" v-for="(word, index) in fields" :key="index">
            <div class="flex items-center">
                <input
                    v-model="fields[index]"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter word"
                />
                <button
                    type="button"
                    @click="removeField(index)"
                    class="flex items-center justify-center ml-2 bg-red-400 text-white px-2 py-2 rounded"
                    v-if="fields.length > 1"
                >
                    <i class="fa-solid fa-xmark mr-2"></i>
                    Remove
                </button>
            </div>
        </div>
        <div class="w-full">
            <button
                type="button"
                @click="addField"
                class="mt-4 bg-green-400 text-white px-4 py-2 rounded flex items-center space-x-2"
            >
                <i class="fa-solid fa-plus"></i>
                <span>Add Word</span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from "vue";

const props = defineProps({
    initialWords: {
        type: Array,
        default: () => []
    }
});

const emit = defineEmits(['update:modelValue']);

// Initialize fields with initialWords
const fields = ref(props.initialWords);

// Emit initial words on component initialization
emit('update:modelValue', fields.value);

const addField = () => {
    fields.value.push("");
    emit('update:modelValue', fields.value);
};

const removeField = (index) => {
    fields.value.splice(index, 1);
    emit('update:modelValue', fields.value);
};
</script>
