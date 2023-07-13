<x-farmer-layout>
    <div class="p-4 sm:ml-64">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <canvas id="acquisitions"></canvas>
            </div>
        </section>
    </div>
</x-farmer-layout>

@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script> --}}
<script>
import Chart from 'chart.js/auto'

(function() {
    const data = [
        { year: 2010, count: 10 },
        { year: 2011, count: 20 },
        { year: 2012, count: 15 },
        { year: 2013, count: 25 },
        { year: 2014, count: 22 },
        { year: 2015, count: 30 },
        { year: 2016, count: 28 },
    ];

    new Chart(
        document.getElementById('acquisitions'),
        {
            type: 'bar',
            data: {
                labels: data.map(row => row.year),
                datasets: [{
                    label: 'Acquisitions by year',
                    data: data.map(row => row.count)
                }]
            }
        }
    );
})();
</script>
@endpush
