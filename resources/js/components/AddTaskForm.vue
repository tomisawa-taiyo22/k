<template>
  <form
    class="relative mb-3 flex flex-col justify-between bg-white rounded-md shadow "
    @submit.prevent="handleAddNewTask"
  >
    <div class="p-3 flex-1">
      <input
        class="block w-full px-2 py-1 text-lg border-b border-blue-800 rounded"
        type="text"
        placeholder="タイトルを入力"
        v-model.trim="newTask.title"
      />
      <textarea
        class="mt-3 p-2 block w-full p-1 border text-sm rounded"
        rows="2"
        placeholder="詳細を入力"
        v-model.trim="newTask.description"
      ></textarea>
      <div v-show="errorMessage">
        <span class="text-xs text-red-500">
          {{ errorMessage }}
        </span>
      </div>
    </div>
    <div class="mt-3 p-2 block w-full p-1 border text-sm rounded" >
      <Datepicker
        placeholder="締め切り日を入力"
        :language="ja"
        :format="DatePickerFormat"
        v-model.trim="newTask.deadline"
      >
      </Datepicker>
    </div>
    <div class="p-3 flex justify-between items-end text-sm bg-gray-100">
      <button
        @click="$emit('task-canceled')"
        type="reset"
        class="py-1 leading-5 text-gray-600 hover:text-gray-700"
      >
        キャンセル
      </button>
      <button
        type="submit"
        class="px-3 py-1 leading-5 text-white bg-orange-600 hover:bg-orange-500 rounded"
      >
        追加
      </button>
    </div>
  </form>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import {ja} from "vuejs-datepicker/dist/locale";

export default {
  components: {
    Datepicker
  },
  props: {
    statusId: Number
  },
  data() {
    return {
      newTask: {
        title: "",
        description: "",
        deadline: "",
        status_id: null
      },
      errorMessage: "",
      ja:ja,
      DatePickerFormat: "yyyy-MM-dd"
    };
  },
  mounted() {
    this.newTask.status_id = this.statusId;
  },
  methods: {
    handleAddNewTask() {
      if (!this.newTask.title) {
        this.errorMessage = "The title field is required";
        return;
      }
      if (this.newTask.deadline){
        this.newTask.deadline = this.newTask.deadline.toISOString().substr(0, 10);
      }

      axios
        .post("/tasks", this.newTask)
        .then(res => {
          this.$emit("task-added", res.data);
        })
        .catch(err => {
          this.handleErrors(err);
        });
    },
    handleErrors(err) {
      if (err.response && err.response.status === 422) {
        const errorBag = err.response.data.errors;
        if (errorBag.title) {
          this.errorMessage = errorBag.title[0];
        } else if (errorBag.description) {
          this.errorMessage = errorBag.description[0];
        } else {
          this.errorMessage = err.response.message;
        }
      } else {
        console.log(err.response);
      }
    }
  }
};
</script>