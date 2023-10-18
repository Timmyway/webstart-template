import { ref } from 'vue';

export default {    
    setup() {
        const say = ref('Hello from Timmy Way !');

        const display = ref({
            navDropdown: false
        });

        return { display }
    }
}
