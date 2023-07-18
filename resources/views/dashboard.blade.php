<x-farmer-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 h-auto">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white p-4 h-auto font-bold text-3xl">
                    <h1 class="block text-center mb-3">
                        Yearly Milk Production
                    </h1>
                    <canvas id="yearChart"></canvas>
                </div>
                <div class="bg-white p-4 h-auto mt-6 font-bold text-3xl">
                        <h1 class="block text-center mb-3">
                            Breed Milk Production
                        </h1>
                        <canvas id="breedChart" class=""></canvas>
                </div>
            </div>
        </section>
    </div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    mylabels = {!! json_encode($months) !!};
    mydata = {!! json_encode($milkCount) !!};

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

    breed = document.getElementById('breedChart');
    mylabels = {!! json_encode($breeds) !!};
    mydata = {!! json_encode($breedCount) !!};

    new Chart(breed, {
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
</script>
@endpush

</x-farmer-layout>
