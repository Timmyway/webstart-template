import { ref } from 'vue';

export default {    
    setup() {
        const say = ref('Tim');

        return { say }
    }
}
