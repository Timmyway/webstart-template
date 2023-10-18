import { computed, ref } from 'vue';

export default {    
    setup() {
        const say = ref('Hello from Timmy Way !');

        const display = ref({
            profileDropdown: false
        });

        const isProfileVisible = computed(() => {
            return display.value.profileDropdown;
        })

        function toogleProfileDropdown() {
            display.value.profileDropdown = !display.value.profileDropdown;
        }

        return { toogleProfileDropdown, isProfileVisible }
    }
}
