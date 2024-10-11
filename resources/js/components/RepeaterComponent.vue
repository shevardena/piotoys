<template>
    <div>
        <div class="grid gap-6 mb-6 md:grid-cols-2" v-for="(field, index) in fields" :key="index">
            <div class="flex items-center">
                <input
                    v-model="field.input1.value"
                    :name="field.input1.name"
                    :placeholder="field.input1.placeholder"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                <input
                    v-model="field.input2.value"
                    :name="field.input2.name"
                    :placeholder="field.input2.placeholder"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-4"
                />
                <button
                    type="button"
                    @click="removeField(index)"
                    class="flex items-center justify-center ml-2 bg-red-400 text-white px-2 py-2 rounded"
                    v-if="fields.length > 1"
                >
                    <i class="fa-solid fa-xmark mr-2"></i>
                    {{ removeButtonText }}
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
                <span>{{ addButtonText }}</span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from "vue";

const props = defineProps({
    initialFields: {
        type: Array,
        default: () => []
    },
    addButtonText: {
        type: String,
        default: 'Add Field'
    },
    removeButtonText: {
        type: String,
        default: 'Remove'
    },
    placeholders: {
        type: Array,
        default: () => []
    }
});

const emit = defineEmits(['update:modelValue']);

const fields = ref(props.initialFields);

emit('update:modelValue', fields.value);

const addField = () => {
    const newIndex = fields.value.length;
    fields.value.push({
        input1: { name: `social_networks[${newIndex}][name]`, value: '', placeholder: props.placeholders[0] },
        input2: { name: `social_networks[${newIndex}][url]`, value: '', placeholder: props.placeholders[1] }
    });
    emit('update:modelValue', fields.value);
};

const removeField = (index) => {
    fields.value.splice(index, 1);
    emit('update:modelValue', fields.value);
};
</script>
