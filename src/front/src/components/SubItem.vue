<script>
import Arrow from "@/components/Arrow.vue";

export default {
  name: "SubItem",
  components: {Arrow},
}
</script>

<template>
  <div class="flex flex-row items-center pl-28 pr-6 w-full mt-1">
    <div class="flex flex-row items-center bg-white border rounded-2xl w-full pr-[130px]">
      <div class="grid grid-cols-12 h-14 ml-[19px] w-full items-center">
        <div class="col-span-3 flex flex-row items-center">
          <span class="mr-3">Ultra-1.0-01.00.00 Рама</span>
        </div>
        <input class="col-span-2 p-0 w-9 h-9 text-center border-1 border-gray-400 rounded-lg" type="text" value="30">
        <div class="col-span-2">
          Производство
        </div>
        <div class="grid grid-cols-4 col-span-4">
          <div>300</div>
          <div>200</div>
          <div>20</div>
          <div>400</div>
        </div>
      </div>
    </div>
  </div>
</template>