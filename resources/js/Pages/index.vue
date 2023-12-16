<script setup>
import { router } from "@inertiajs/vue3";
defineProps({ customers: Object });

function edit(id) {
    router.get("/customers/" + id + "/edit");
}

function destroy(id) {
    router.delete("/customers/" + id);
}

function create() {
  router.create('/customers/create');
}
</script>

<template>
    <div class="flex flex-col items-center p-8 bg-gray-300 h-screen">
        <div
            v-if="$page.props.flash.message"
            role="alert"
            class="alert alert-success h-fit sticky mb-4"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="stroke-current shrink-0 h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
            <span>{{ $page.props.flash.message }}</span>
        </div>
        <div class="w-fit">
            <table class="table border">
                <!-- head -->
                <thead class="bg-accent">
                    <tr class="">
                        <th class="text-gray-900 text-lg font-semibold">
                            Name
                        </th>
                        <th class="text-gray-900 text-lg font-semibold">
                            Phone
                        </th>
                        <th class="text-gray-900 text-lg font-semibold">
                            Email
                        </th>
                        <th class="text-gray-900 text-lg font-semibold">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800">
                    <tr v-for="customer in customers" class="hover">
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>{{ customer.email }}</td>
                        <td class="p-4 space-x-2">
                            <button
                                type="submit"
                                class="btn btn-outline btn-info px-3"
                            >
                                View
                            </button>
                            <button
                                @click.prevent="edit(customer.id)"
                                type="submit"
                                class="btn btn-outline btn-warning px-3"
                            >
                                Edit
                            </button>

                            <button
                                @click.prevent="destroy(customer.id)"
                                type="submit"
                                class="btn btn-outline btn-error px-3"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="./customers/create"
           
                type="submit"
                class="btn btn-outline btn-info bg-gray-900 px-3 w-full overflow-hidden mt-2"
            >
                Add user
            </a>
        </div>
    </div>
</template>
