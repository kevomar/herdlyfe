<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>



    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
      <div
        class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
      >
        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="mt-4 text-center">
            <h1 class="block w-full font-semibold text-xl">
              Number of users  
            </h1>
            <p class="mt-3">
              {{ $users->count() }}
            </p>
          </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="mt-4 text-center">
            <h1 class="block w-full font-semibold text-xl">
              Number of Cattle  
            </h1>
            <p class="mt-3">
              {{ $cattles->count() }}
            </p>
          </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="mt-4 text-center">
            <h1 class="block w-full font-semibold text-xl">
              Amount of milk Produced
            </h1>
            <p class="mt-3">
              @php
                $amount = 0;
                foreach($milks as $milk){
                  $amount += $milk->quantity;
                }
              @endphp
              {{ $amount.' L' }}
            </p>
          </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
          <div class="mt-4 text-center">
            <h1 class="block w-full font-semibold text-xl">
              Amount of cattle for sale  
            </h1>
            <p class="mt-3">
              {{ $markets->count() }}
            </p>
          </div>
        </div>
        <!-- Card Item End -->
      </div>

      <div
        class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5"
      >
        <!-- ====== Chart One Start -->
        <div
class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8"
>
      <canvas id=yearChart></canvas>
</div>

        <!-- ====== Chart One End -->

        <!-- ====== Chart Two Start -->
        
        <div class="col-span-4 rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark xl:col-span-4">
          <canvas id="weekChart" class="h-full"></canvas>
        </div>


        <!-- ====== Chart Two End -->

       
      </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    mylabels = {!! json_encode($months) !!};
    mydata = {!! json_encode($milkCount) !!};
    console.log(mylabels)
    console.log(mydata)
    const ctx = document.getElementById('yearChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: mylabels,
        datasets: [{
          label: 'Amount of milk in Liters For this year',
          data: mydata,
          borderWidth: 1,
          backgroundColor: '#9BD0F5'
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const weekChart = document.getElementById('weekChart');
    weekLabel = {!! json_encode($week) !!}
    weekData = {!! json_encode($weekCount) !!}



    new Chart(weekChart, {
      type: 'bar',
      data: {
        labels: weekLabel,
        datasets: [{
          label: 'Amount of milk in Liters For this week',
          data: weekData,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  </script>

@endpush

</x-app-layout>
