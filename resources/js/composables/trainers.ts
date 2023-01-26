import {ref, onMounted} from 'vue'
import axios from 'axios'
import {useRouter} from 'vue-router'

export default function useTrainers(): {
    message: any,
    errors: any,
    trainer: any,
    trainers: any,
    getTrainer: (id: number) => Promise<void>,
    getTrainers: () => Promise<void>,
    storeTrainer: (data: object) => Promise<void>,
    updateTrainer: (id: number) => Promise<void>,
} {
    axios.defaults.withCredentials = true;
    const trainer = ref([]);
    const trainers = ref([]);
    const message = ref('');
    const errors = ref('');
    const router = useRouter();

    const getTrainers = async (): Promise<void> => {
        let response = await axios.get('/api/trainers');
        trainers.value = response.data.trainers;
    }


    const getTrainer = async (id: number): Promise<void> => {
        let response = await axios.get(`/api/trainers/${id}`);
        trainer.value = response.data.data;

    }

    const storeTrainer = async (data: object): Promise<void> => {

        errors.value = '';
        try {
            let response = await axios.post('', data);
            console.log('done')
            message.value = response.data.message;
        } catch (e) {
            const error = e as any;
            if (error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value = error.response.data.errors;
                }
            }
        }
    }

    const updateTrainer = async (id: number): Promise<void> => {
        errors.value = ''
        try {
            await axios.patch(`/api/trainers/${id}`, trainer.value);
            await router.push({name: 'trainers.index'});
        } catch (e) {
            const error = e as any;
            if (error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value = error.response.data.errors;
                }
            }
        }
    }

    return {
        message,
        errors,
        trainer,
        trainers,
        getTrainer,
        getTrainers,
        storeTrainer,
        updateTrainer
    }
}
