
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

  <style>
    [x-cloak] {
      display: none;
    }
  </style>

<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak class="w-full">
    <input type="hidden" name="date" x-ref="date">
        <input 
            type="text" readonly x-model="datepickerValue" @click="showDatepicker = !showDatepicker" @keydown.escape="showDatepicker = false"
            class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3 z-50
            @error('date') border-red-500 @enderror"
            placeholder="Select date">
    
                          <div 
                              class="bg-gray-700 mt-12 rounded-lg shadow p-4 absolute top-0 left-0 text-white" 
                              style="width: 17rem;" 
                              x-show.transition="showDatepicker"
                              @click.away="showDatepicker = false">

                              <div class="flex justify-between items-center mb-2">
                                  <div>
                                      <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-white"></span>
                                      <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                  </div>
                                  <div>
                                      <button 
                                          type="button"
                                          class="inline-flex cursor-pointer hover:bg-gray-200 hover:text-gray-700 p-1 rounded-full" 
                                          :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                          :disabled="month == 0 ? true : false"
                                          @click="month--; getNoOfDays()">
                                          <svg class="h-6 w-6 text-whiteinline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                          </svg>  
                                      </button>
                                      <button 
                                          type="button"
                                          class=" inline-flex cursor-pointer hover:bg-gray-200 hover:text-gray-700 p-1 rounded-full" 
                                          :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                          :disabled="month == 11 ? true : false"
                                          @click="month++; getNoOfDays()">
                                          <svg class="h-6 w-6 text-white inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                          </svg>									  
                                      </button>
                                  </div>
                              </div>

                              <div class="flex flex-wrap mb-3 -mx-1">
                                  <template x-for="(day, index) in DAYS" :key="index">	
                                      <div style="width: 14.26%" class="px-1">
                                          <div
                                              x-text="day" 
                                              class="text-white font-medium text-center text-xs"></div>
                                      </div>
                                  </template>
                              </div>

                              <div class="flex flex-wrap -mx-1">
                                  <template x-for="blankday in blankdays">
                                      <div 
                                          style="width: 14.28%"
                                          class="text-center border p-1 border-transparent text-sm"	
                                      ></div>
                                  </template>	
                                  <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                      <div style="width: 14.28%" class="px-1 mb-1">
                                          <div
                                              @click="getDateValue(date)"
                                              x-text="date"
                                              class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                              :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-white hover:bg-blue-200': isToday(date) == false }"	
                                          ></div>
                                      </div>
                                  </template>
                              </div>
                          </div>

      </div>

      <script>
          const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
          const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

          function app() {
              return {
                  showDatepicker: false,
                  datepickerValue: '',

                  month: '',
                  year: '',
                  no_of_days: [],
                  blankdays: [],
                  days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                  initDate() {
                      let today = new Date();
                      this.month = today.getMonth();
                      this.year = today.getFullYear();
                      this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                  },

                  isToday(date) {
                      const today = new Date();
                      const d = new Date(this.year, this.month, date);

                      return today.toDateString() === d.toDateString() ? true : false;
                  },

                  getDateValue(date) {
                      let selectedDate = new Date(this.year, this.month, date);
                      this.datepickerValue = selectedDate.toDateString();

                      this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);

                      console.log(this.$refs.date.value);

                      this.showDatepicker = false;
                  },

                  getNoOfDays() {
                      let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                      // find where to start calendar day of week
                      let dayOfWeek = new Date(this.year, this.month).getDay();
                      let blankdaysArray = [];
                      for ( var i=1; i <= dayOfWeek; i++) {
                          blankdaysArray.push(i);
                      }

                      let daysArray = [];
                      for ( var i=1; i <= daysInMonth; i++) {
                          daysArray.push(i);
                      }

                      this.blankdays = blankdaysArray;
                      this.no_of_days = daysArray;
                  }
              }
          }
      </script>
    </div>
