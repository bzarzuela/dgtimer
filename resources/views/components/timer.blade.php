<div
    x-data="{
        timer: {
            minutes: '00',
            seconds: '00',
            mili: '000',
        },
        startTime: null,
        elapsedTime: 0,
        runningCounter: null,
        running: false,
        finished: false,
        formatCounter(number, length = 2) {
            return number.toString().padStart(length, '0');
        },
        timeLap() {
            let startDate = this.startTime.getTime();
            let timeDistance = new Date().getTime() - startDate;

            this.elapsedTime = timeDistance;

            this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)));
            this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000));
            this.timer.mili = this.formatCounter(timeDistance % 1000, 3);
        },
        startTiming() {
            this.startTime = new Date(new Date().getTime() + 3000);

            this.runningCounter = setInterval(() => { this.timeLap() }, 10);

            this.running = true;
        },
        stopTiming() {
            clearInterval(this.runningCounter);

            this.finished = true;

            // Because we did setInterval every 10ms, we need to get the exact time when the stop button is clicked
            this.timeLap();
        }
    }"
    x-modelable="elapsedTime"
    {{ $attributes }}
>
    <div class="text-7xl sm:text-8xl font-mono text-center">
        <div x-cloak x-show="elapsedTime >= 0">
            <span x-text="timer.minutes">00</span>:<span x-text="timer.seconds">00</span>.<span x-text="timer.mili">000</span>
        </div>

        <div x-cloak x-show="elapsedTime < 0" class="flex space-x-4 justify-center">
            <div class="grid grid-cols-3">
                <span x-show="elapsedTime > -3000">
                <x-heroicon-s-rocket-launch class="h-48 w-48 text-red-500" />
            </span>
                <span x-show="elapsedTime > -2000">
                <x-heroicon-s-rocket-launch class="h-48 w-48 text-red-500" />
            </span>
                <span x-show="elapsedTime > -1000">
                <x-heroicon-s-rocket-launch class="h-48 w-48 text-red-500" />
            </span>
            </div>
        </div>
    </div>

    <button x-show="!running" @click="startTiming()" type="button" class="w-full h-24 flex items-center justify-center gap-x-2 rounded-md bg-green-600 px-3.5 py-2.5 text-6xl font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
        <x-heroicon-c-check-circle class="h-14 w-14" />
        Start
    </button>

    <button x-show="running && !finished && elapsedTime > 0" @click="stopTiming()" type="button" class="w-full h-24 flex items-center justify-center gap-x-2 rounded-md bg-red-600 px-3.5 py-2.5 text-6xl font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
        <x-heroicon-c-x-circle class="h-14 w-14" />
        Stop
    </button>
</div>
