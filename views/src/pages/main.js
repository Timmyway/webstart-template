import { ref } from 'vue';

export default {    
    setup() {
        const say = ref('Hello from Timmy Way !');

        return { say }
    }
}
