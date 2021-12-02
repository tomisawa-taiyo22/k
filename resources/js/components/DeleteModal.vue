<template>
	 <transition name="modal">
		<div class="overlay">
			<div class="panel" @click.stop>
				<div class="text-center text-gray-500 mb-6">
					<h3>本当にこのステータスを削除しますか?
					</h3>
				</div>
				<div class="p-3 flex justify-between items-end text-sm bg-gray-100">
					<button
						@click="$emit('delete-canceled')"
						type="reset"
						class="py-1 leading-5 text-gray-600 hover:text-gray-700"
					>
						キャンセル
					</button>
					<button
						@click="$emit('status-deleted')"
						type="submit"
						class="px-3 py-1 leading-5 text-white bg-orange-600 hover:bg-orange-500 rounded"
					>
						削除
					</button>
				</div>
			</div>
		</div>
	 </transition>
</template>

<script>
export default {
	methods: {
		
	}
}
</script>

<style>
.overlay {
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 900;
    transition: all .5s ease;
}
.panel {
    width: 300px;
    height: 250px;
    background: #fff;
    padding: 20px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -150px;
    margin-top: -100px;
    transition: all .3s ease;
}
.modal-enter, .modal-leave-active {
    opacity: 0;
}

.modal-enter .panel, .modal-leave-active .panel{
    top: -200px;
}
</style>