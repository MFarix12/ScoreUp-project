
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScoreUp | Chase Your Dream</title>
    <link rel="icon" href="/scoreup-logo.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background: #E9E3E6;
            color: #1F2937;
        }
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 3rem 0 3rem;
            width: 100%;
            z-index: 10;
        }
        .nav-logo {
            font-size: 2.2rem;
            font-weight: 900;
            color: #DC2626;
            letter-spacing: -2px;
        }
        .nav-actions {
            display: flex;
            gap: 1.2rem;
            align-items: center;
        }
        .nav-actions a {
            background: #DC2626;
            color: #fff;
            border-radius: 2rem;
            padding: 0.7rem 2.7rem;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .nav-actions a:hover {
            background: #F97316;
            color: #fff;
        }
        .main-card-row {
            display: flex;
            gap: 2.5rem;
            margin: 2.5rem auto 0 auto;
            max-width: 1100px;
            justify-content: center;
        }
        .main-card {
            background: #fff;
            border-radius: 2.2rem;
            box-shadow: 0 2px 16px rgba(220,38,38,0.08);
            padding: 2.2rem 2.5rem 1.7rem 2.5rem;
            min-width: 340px;
            max-width: 480px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 2px solid #E5E7EB;
        }
        .slider-img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(220,38,38,0.10);
        }
        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #E5E7EB;
            cursor: pointer;
        }
        .slider-dot.active {
            background: #DC2626;
        }
        .main-card-quote {
            font-size: 1.5rem;
            font-weight: 700;
            color: #DC2626;
            margin-top: 2.5rem;
            text-align: center;
        }
        .nav-tabs {
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            margin: 2.5rem auto 0 auto;
            max-width: 900px;
        }
        .nav-tab {
            background: #fff;
            color: #DC2626;
            font-weight: 700;
            font-size: 1.2rem;
            border-radius: 1.5rem 1.5rem 0 0;
            padding: 1rem 2.5rem;
            border: 2px solid #DC2626;
            border-bottom: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .nav-tab.active {
            background: #DC2626;
            color: #fff;
        }
        .schedule-section {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 2px 16px rgba(220,38,38,0.08);
            padding: 2.2rem 2.5rem 1.7rem 2.5rem;
            max-width: 1100px;
            margin: 0 auto 2.5rem auto;
        }
        .schedule-header {
            font-size: 2rem;
            font-weight: 900;
            color: #DC2626;
            margin-bottom: 1.5rem;
        }
        .schedule-filters {
            display: flex;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .schedule-filters select {
            padding: 0.7rem 1.2rem;
            border-radius: 1rem;
            border: 2px solid #E5E7EB;
            font-size: 1rem;
            font-weight: 600;
            color: #1F2937;
        }
        .view-toggle-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .filter-btn {
            background: linear-gradient(90deg, #dc2626 0%, #fb7185 100%);
            color: #fff;
            border-radius: 1.5rem;
            padding: 0.7rem 2.2rem;
            font-weight: 900;
            font-size: 1.15rem;
            border: none;
            box-shadow: 0 2px 12px rgba(220,38,38,0.13);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        .filter-btn:hover {
            background: linear-gradient(90deg, #fb7185 0%, #dc2626 100%);
            box-shadow: 0 4px 24px rgba(220,38,38,0.18);
            transform: translateY(-2px) scale(1.03);
        }
        .filter-btn:active {
            background: #dc2626;
            box-shadow: 0 2px 8px rgba(220,38,38,0.10);
            transform: scale(0.98);
        }
        .filter-btn svg {
            height: 1.3em;
            width: 1.3em;
        }
        .filter-modal {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 8px 40px rgba(220,38,38,0.18);
            padding: 2.5rem 2.2rem 2rem 2.2rem;
            max-width: 420px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            position: relative;
        }
        .filter-modal .modal-title {
            font-size: 1.5rem;
            font-weight: 900;
            color: #dc2626;
            margin-bottom: 1.2rem;
            text-align: center;
        }
        .filter-modal .modal-section {
            margin-bottom: 1.2rem;
        }
        .filter-modal .modal-label {
            font-weight: 700;
            color: #22223b;
            margin-bottom: 0.5rem;
            font-size: 1.08rem;
        }
        .filter-modal .modal-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        .filter-modal .modal-btn {
            padding: 0.7rem 2rem;
            border-radius: 1rem;
            font-weight: 900;
            font-size: 1.08rem;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .filter-modal .modal-btn.cancel {
            background: #e5e7eb;
            color: #52525b;
        }
        .filter-modal .modal-btn.apply {
            background: linear-gradient(90deg, #dc2626 0%, #fb7185 100%);
            color: #fff;
        }
        .filter-modal .modal-btn.apply:hover {
            background: linear-gradient(90deg, #fb7185 0%, #dc2626 100%);
        }
        .view-toggle-btn {
            background: #fff;
            color: #DC2626;
            border-radius: 1.5rem;
            padding: 0.7rem 2rem;
            font-weight: 700;
            font-size: 1.1rem;
            border: 2px solid #DC2626;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .view-toggle-btn.active {
            background: #DC2626;
            color: #fff;
        }
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        .match-card {
            background: linear-gradient(to right, #dbeafe, #e9d5ff); /* blue-100 to purple-100 */
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(220,38,38,0.10);
            padding: 1.5rem 1.2rem 1.2rem 1.2rem;
            border: 2px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            font-family: Arial, sans-serif;
        }
        .match-card .match-type {
            font-size: 1.1rem;
            font-weight: 700;
            color: #DC2626;
            margin-bottom: 0.5rem;
        }
        .match-card .match-info {
            font-size: 1rem;
            color: #1F2937;
            font-weight: 600;
        }
        .match-card .match-teams {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .match-card .match-score {
            background: #F97316;
            color: #fff;
            border-radius: 1rem;
            padding: 0.3rem 1.2rem;
            font-size: 1.1rem;
            font-weight: 900;
        }
        .match-card .match-status {
            font-size: 0.95rem;
            font-weight: 700;
            color: #22C55E;
        }
        .schedule-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .rule-card {
            background: #fff;
            border-radius: 2.2rem;
            box-shadow: 0 4px 32px rgba(220,38,38,0.12);
            padding: 2.5rem 2.5rem 2rem 2.5rem;
            border: 2px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            align-items: left;
            min-height: 200px;
            max-width: 200px;
            margin: auto;
            transition: box-shadow 0.2s, border 0.2s;
        }
        .rule-card:hover {
            box-shadow: 0 8px 40px rgba(220,38,38,0.18);
            border-color: #F97316;
        }
        .rule-card .rule-sport {
            font-size: 1.5rem;
            font-weight: 900;
            color: #DC2626;
            margin-bottom: 0.7rem;
            text-align: center;
        }
        .rule-card .rule-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .rule-card .rule-desc {
            color: #374151;
            font-size: 1.08rem;
            margin-bottom: 1.1rem;
            text-align: center;
        }
        .rule-card .rule-actions {
            margin-top: auto;
            display: flex;
            gap: 0.7rem;
            justify-content: center;
        }
        @media (max-width: 1100px) {
            .main-card-row, .schedule-section { max-width: 100%; }
            .schedule-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 900px) {
            .main-card-row { flex-direction: column; align-items: center; gap: 1.5rem; }
            .schedule-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 700px) {
            .nav { flex-direction: column; gap: 1rem; padding: 1rem; }
            .main-card { min-width: 90vw; max-width: 98vw; }
            .schedule-section { padding: 1rem; }
        }

        /* Live Scoreboard Table Styles */
        .scoreboard-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(220,38,38,0.10);
            overflow: hidden;
        }
        .scoreboard-table thead tr {
            background: linear-gradient(90deg, #fde68a 0%, #fb923c 50%, #ef4444 100%);
        }
        .scoreboard-table th, .scoreboard-table td {
            padding: 1rem 1.2rem;
            font-size: 1.1rem;
            border-bottom: 2px solid #f3f4f6;
        }
        .scoreboard-table th {
            font-weight: 900;
            color: #1F2937;
            text-align: center;
        }
        .scoreboard-table td {
            background: linear-gradient(to right, #dbeafe, #e9d5ff); /* blue-100 to purple-100 */
            font-weight: 700;
            color: #374151;
            text-align: center;
            background: #fff;
        }
        .scoreboard-table td.team-cell {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            background: #fff;
            border-radius: 1.2rem 0 0 1.2rem;
            font-weight: 900;
            color: #DC2626;
            text-align: left;
        }
        .team-logo {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(220,38,38,0.10);
            background: #fff;
            display: block;
            margin-right: 0.5rem;
        }
        .avatar-xl {
            width: 3rem;
            height: 3rem;
        }
        .avatar-2xl {
            width: 3rem;
            height: 3rem;
        }
        @media (min-width: 700px) {
            .avatar-xl {
                width: 3.5rem;
                height: 3.5rem;
            }
            .avatar-2xl {
                width: 4rem;
                height: 4rem;
            }
        }
        .scoreboard-table td.gold {
            color: #eab308;
            background: #fff;
            font-size: 1.2rem;
            font-weight: 900;
        }
        .scoreboard-table td.silver {
            color: #a1a1aa;
            background: #fff;
            font-size: 1.2rem;
            font-weight: 900;
        }
        .scoreboard-table td.bronze {
            color: #b45309;
            background: #fff;
            font-size: 1.2rem;
            font-weight: 900;
        }
        .match-card .flex.items-center.gap-2,
        .custom-match-card .flex.items-center.gap-2 {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .match-card .flex.items-center.gap-3,
        .custom-match-card .flex.items-center.gap-3 {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }
        .match-card .font-bold.text-base,
        .custom-match-card .font-bold.text-base {
            margin-left: 0.2rem;
        }
        .scoreboard-table tr:last-child td {
            border-bottom: none;
        }
        .scoreboard-table tr:hover td {
            background: #fef3c7;
            transition: background 0.2s;
        }

        .custom-match-card {
            background: linear-gradient(to right, #dbeafe, #e9d5ff); /* blue-100 to purple-100 */
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(31,41,55,0.08);
            border: 1.5px solid #e5e7eb;
            padding: 2rem 2rem 1.5rem 2rem;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            transition: box-shadow 0.2s, border 0.2s;
            font-family: Arial, sans-serif;
        }
        .custom-match-card:hover {
            box-shadow: 0 8px 32px rgba(31,41,55,0.13);
            border-color: #a5b4fc;
        }
        .match-card .font-bold,
        .custom-match-card .font-bold {
            font-weight: 900 !important;
            color: #22223b !important;
            letter-spacing: 0.5px;
        }
        .match-card .text-lg,
        .custom-match-card .text-lg {
            font-size: 1.18rem !important;
            font-weight: 900 !important;
            color: #22223b !important;
        }
        .match-card .text-base,
        .custom-match-card .text-base {
            font-size: 1.08rem !important;
            color: #22223b !important;
        }
        .match-card .text-gray-500,
        .custom-match-card .text-gray-500 {
            color: #a1a1aa !important;
        }
        .match-card .text-gray-700,
        .custom-match-card .text-gray-700 {
            color: #6b7280 !important;
        }
        .match-card .text-gray-600,
        .custom-match-card .text-gray-600 {
            color: #52525b !important;
        }
        .score-box {
            background: #f3f4f6;
            color: #22223b;
            border-radius: 0.7rem;
            padding: 0.4rem 1.2rem;
            font-size: 1.18rem;
            font-weight: 900;
            min-width: 60px;
            text-align: center;
            box-shadow: 0 1px 4px rgba(31,41,55,0.07);
            border: 1.5px solid #e5e7eb;
        }
        .match-card .score-box {
            background: #f3f4f6;
            color: #22223b;
            border-radius: 0.7rem;
            padding: 0.4rem 1.2rem;
            font-size: 1.18rem;
            font-weight: 900;
            min-width: 60px;
            text-align: center;
            box-shadow: 0 1px 4px rgba(31,41,55,0.07);
            border: 1.5px solid #e5e7eb;
        }
        .match-card .status-finalized,
        .custom-match-card .status-finalized {
            background: #d1fae5 !important;
            color: #059669 !important;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 0.5rem;
            padding: 0.3rem 1.1rem;
            display: inline-block;
        }
        .match-card .status-ongoing,
        .custom-match-card .status-ongoing {
            background: #fef9c3 !important;
            color: #b45309 !important;
            font-weight: 700;
            font-size: 1rem;
            border-radius: 0.5rem;
            padding: 0.3rem 1.1rem;
            display: inline-block;
        }
        @media (max-width: 700px) {
            .scoreboard-table th, .scoreboard-table td {
                padding: 0.6rem 0.5rem;
                font-size: 0.98rem;
            }
        }
    </style>
</head>
<body x-data="{ slider: 0, images: [
    '/storage/backgrounds/POSTER_BADMINTON.jpg',
    '/storage/backgrounds/POSTER_BOLASEPAK.jpg',
    '/storage/backgrounds/POSTER_FRISBEE.jpg',
    '/storage/backgrounds/POSTER_NETBALL.jpg'
], timer: null }" x-init="timer = setInterval(() => { slider = (slider + 1) % images.length }, 2000)">
    <div class="nav">
        <img src="/scoreup-logo.svg" alt="ScoreUp Logo" style="height:60px; margin-right:1rem; border-radius:12px; box-shadow:0 2px 8px rgba(220,38,38,0.10); background:#fff;">
        <div class="nav-actions">
            <a href="{{ route('login') }}">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>

    <!-- Single Card View for Landscape Poster -->
    <div style="width:100%; display:flex; justify-content:center; align-items:center; margin-top:2rem;">
        <div class="main-card" style="max-width:1000px; width:100%; margin:0 auto; display:flex; flex-direction:column; align-items:center;">
            <img src="/storage/backgrounds/MAIN_POSTER.jpg" alt="Landscape Poster" class="slider-img" style="height:320px; object-fit:cover; border-radius:1.5rem; box-shadow:0 2px 12px rgba(220,38,38,0.10); display:block; margin:auto;">
        </div>
    </div>

    <div class="main-card-row">
        <div class="main-card" style="flex:1;">
            <div style="width:100%;">
                <img :src="images[slider]" class="slider-img" alt="Sport Image">
                <div class="slider-controls">
                    <template x-for="(img, idx) in images">
                        <div :class="'slider-dot' + (slider === idx ? ' active' : '')" @click="slider = idx"></div>
                    </template>
                </div>
            </div>
        </div>
        <div class="main-card" style="flex:1; display:flex; align-items:center; justify-content:center;">
            <div class="main-card-quote">Upcoming event soon!<br>stay tune</div>
        </div>
    </div>

    <div x-data="Object.assign({ tab: 'schedule' }, scheduleComponent())">
        <div class="nav-tabs">
            <button @click="tab = 'rules'" :class="tab === 'rules' ? 'nav-tab active' : 'nav-tab'">Rules</button>
            <button @click="tab = 'scoreboard'" :class="tab === 'scoreboard' ? 'nav-tab active' : 'nav-tab'">Live Scoreboard</button>
            <button @click="tab = 'schedule'" :class="tab === 'schedule' ? 'nav-tab active' : 'nav-tab'">Schedule</button>
        </div>

        <div x-show="tab === 'schedule'" class="schedule-section w-full max-w-full mx-auto px-2">
            <div class="schedule-header">Match Schedule</div>
            <div class="flex items-center justify-between mb-4">
                <div class="view-toggle-row flex gap-2">
                    <button @click="viewType = 'grid'" :class="viewType === 'grid' ? 'view-toggle-btn active' : 'view-toggle-btn'">Grid View</button>
                    <button @click="viewType = 'list'" :class="viewType === 'list' ? 'view-toggle-btn active' : 'view-toggle-btn'">List View</button>
                </div>
                <button @click="showFilter = true" class="filter-btn">
                    <span>Filter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-5.414 5.414A1 1 0 0015 13v5a1 1 0 01-1 1h-4a1 1 0 01-1-1v-5a1 1 0 00-.293-.707L3.293 6.707A1 1 0 013 6V4z" /></svg>
                </button>
            </div>
            <!-- Filter Modal -->
            <div x-show="showFilter" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                <div class="filter-modal">
                    <div class="modal-title">Filter Schedule</div>
                    <div class="modal-section">
                        <div class="modal-label">Sport</div>
                        <div class="flex flex-wrap gap-2">
                            <button @click="filterSport = ''" :class="filterSport === '' ? 'modal-btn apply' : 'modal-btn cancel'">All</button>
                            <template x-for="sport in sports" :key="sport.id">
                                <button @click="filterSport = sport.id" :class="filterSport === sport.id ? 'modal-btn apply' : 'modal-btn cancel'" x-text="sport.sport_name"></button>
                            </template>
                        </div>
                    </div>
                    <div class="modal-section">
                        <div class="modal-label">Gender</div>
                        <div class="flex gap-2">
                            <button @click="filterGender = ''" :class="filterGender === '' ? 'modal-btn apply' : 'modal-btn cancel'">All</button>
                            <button @click="filterGender = 'Male'" :class="filterGender === 'Male' ? 'modal-btn apply' : 'modal-btn cancel'">Male</button>
                            <button @click="filterGender = 'Female'" :class="filterGender === 'Female' ? 'modal-btn apply' : 'modal-btn cancel'">Female</button>
                            <button @click="filterGender = 'Mixed'" :class="filterGender === 'Mixed' ? 'modal-btn apply' : 'modal-btn cancel'">Mixed</button>
                        </div>
                    </div>
                    <div class="modal-actions">
                        <button @click="showFilter = false" class="modal-btn cancel">Cancel</button>
                        <button @click="showFilter = false" class="modal-btn apply">Apply</button>
                    </div>
                </div>
            </div>

            <template x-if="viewType === 'grid'">
                {{-- <div class="schedule-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $schedules = \App\Models\Schedule::with(['sport', 'teamA', 'teamB'])->orderBy('match_date')->get();
                @endphp
                @forelse($schedules as $match)
                    <div class="match-card flex flex-col gap-2">
                        <div class="flex items-center gap-2 mb-1">

                            @if($match->teamA && $match->teamA->photo)
                                <img src="{{ asset('storage/' . $match->teamA->photo) }}" alt="logo" class="w-7 h-7 rounded-full object-cover border border-gray-300" />
                            @else
                                <span class="inline-block w-7 h-7 rounded-full bg-gray-200 border border-gray-300"></span>
                            @endif

                            <span class="font-bold text-base">{{ $match->teamA->name ?? '-' }}</span>
                            <span class="mx-2 font-bold text-gray-600">vs</span>

                            @if($match->teamB && $match->teamB->photo)
                                <img src="{{ asset('storage/' . $match->teamB->photo) }}" alt="logo" class="w-7 h-7 rounded-full object-cover border border-gray-300" />
                            @else
                                <span class="inline-block w-7 h-7 rounded-full bg-gray-200 border border-gray-300"></span>
                            @endif

                            <span class="font-bold text-base">{{ $match->teamB->name ?? '-' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-semibold text-gray-700">Gender:</span>
                            <span>{{ $match->gender }}</span>
                            <span class="ml-4 font-semibold text-gray-700">Score:</span>
                            <span class="font-bold">{{ $match->score_a ?? '-' }} : {{ $match->score_b ?? '-' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-semibold text-gray-700">Status:</span>
                            @if($match->is_done)
                                <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">Finalized</span>
                            @else
                                <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">Ongoing</span>
                            @endif
                        </div>
                    </div>
                    @empty
                        <div class="col-span-full text-center text-gray-400 py-8">No matches found.</div>
                    @endforelse
                </div> --}}
                <div class="schedule-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $schedules = \App\Models\Schedule::with(['sport', 'teamA', 'teamB'])->orderBy('match_date')->get();
                    @endphp
                    <template x-for="match in filteredSchedules" :key="match.id">
                        <div class="match-card custom-match-card p-6 rounded-2xl shadow-lg border border-gray-200 flex flex-col gap-3 relative" style="min-width:200px;">
                            <div class="absolute top-3 left-3 w-3 h-3 rounded-full bg-blue-100"></div>
                            <div class="absolute top-3 right-3 w-3 h-3 rounded-full bg-purple-100"></div>
                            <div class="font-bold text-lg flex items-center gap-2 mb-1">
                                <span x-text="match.sport.sport_name"></span>
                                <span class="text-gray-500 text-base font-semibold" x-text="'(' + match.gender + ')'" style="font-weight:500;"></span>
                            </div>
                            <div class="text-gray-700 text-base mb-2" x-text="match.match_date + ' • ' + match.match_time"></div>
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <div class="flex items-center gap-2">
                                    <template x-if="match.teamA && match.teamA.photo">
                                        <img :src="'/storage/' + match.teamA.photo" alt="A" class="team-avatar" />
                                    </template>
                                    <template x-if="!match.teamA || !match.teamA.photo">
                                        <span class="inline-block team-avatar bg-gray-200 border border-gray-300"></span>
                                    </template>
                                    <span class="font-bold text-base ml-1" x-text="match.teamA ? match.teamA.name : '-' "></span>
                                </div>
                                <span class="mx-2 font-bold text-gray-600">vs</span>
                                <div class="flex items-center gap-2">
                                    <template x-if="match.teamB && match.teamB.photo">
                                        <img :src="'/storage/' + match.teamB.photo" alt="B" class="team-avatar" />
                                    </template>
                                    <template x-if="!match.teamB || !match.teamB.photo">
                                        <span class="inline-block team-avatar bg-gray-200 border border-gray-300"></span>
                                    </template>
                                    <span class="font-bold text-base ml-1" x-text="match.teamB ? match.teamB.name : '-' "></span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mb-2">
                                <span class="score-box font-bold" x-text="(match.score_a ?? '-') + ' : ' + (match.score_b ?? '-')"></span>
                            </div>
                            <div class="text-gray-600 text-sm mb-2" x-text="'Venue: ' + (match.venue ?? '-')"></div>
                            <div>
                                <span x-show="match.is_done" class="status-finalized">Finalized</span>
                                <span x-show="!match.is_done" class="status-ongoing">Ongoing</span>
                            </div>
                        </div>
                    </template>
                    <template x-if="filteredSchedules.length === 0">
                        <div class="col-span-full text-center text-gray-400 py-8">No matches found.</div>
                    </template>
                </div>
            </template>

            <template x-if="viewType === 'list'">
                <div class="schedule-list flex flex-col gap-4">
                    <template x-for="match in sortedSchedules" :key="match.id">
                        <div class="match-card flex flex-col gap-3 p-5">
                            <div class="flex items-center gap-4 mb-2">
                                <span class="font-bold text-lg text-red-600" x-text="match.sport.sport_name"></span>
                                <span class="text-gray-500 text-base font-semibold" x-text="'(' + match.gender + ')'" ></span>
                            </div>
                            <div class="flex items-center gap-4 mb-2">
                                <div class="flex items-center gap-2">
                                    <template x-if="match.teamA && match.teamA.photo">
                                        <img :src="'/storage/' + match.teamA.photo" alt="A" class="team-avatar avatar-2xl" />
                                    </template>
                                    <template x-if="!match.teamA || !match.teamA.photo">
                                        <span class="inline-block team-avatar avatar-2xl bg-gray-200 border border-gray-300"></span>
                                    </template>
                                    <span class="font-bold text-base ml-1" x-text="match.teamA ? match.teamA.name : '-' "></span>
                                </div>
                                <span class="score-box font-bold" x-text="(match.score_a ?? '-') + ' : ' + (match.score_b ?? '-')"></span>
                                <div class="flex items-center gap-2">
                                    <template x-if="match.teamB && match.teamB.photo">
                                        <img :src="'/storage/' + match.teamB.photo" alt="B" class="team-avatar avatar-2xl" />
                                    </template>
                                    <template x-if="!match.teamB || !match.teamB.photo">
                                        <span class="inline-block team-avatar avatar-2xl bg-gray-200 border border-gray-300"></span>
                                    </template>
                                    <span class="font-bold text-base ml-1" x-text="match.teamB ? match.teamB.name : '-' "></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mb-2">
                                <span class="text-gray-700 text-base" x-text="match.match_date + ' • ' + match.match_time"></span>
                                <span class="text-gray-600 text-base" x-text="'Venue: ' + (match.venue ?? '-')"></span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <span class="font-semibold text-gray-700">Status:</span>
                                <span x-show="match.is_done" class="status-finalized">Finalized</span>
                                <span x-show="!match.is_done" class="status-ongoing">Ongoing</span>
                            </div>
                        </div>
                    </template>
                    <template x-if="sortedSchedules.length === 0">
                        <div class="col-span-full text-center text-gray-400 py-8">No matches found.</div>
                    </template>
                </div>
            </template>
        </div>

        <div x-show="tab === 'rules'" class="schedule-section w-full max-w-full mx-auto px-2">
            <div class="schedule-header">Sport Rules</div>
            @php
                $rules = \App\Models\Rules::with('sport')->orderBy('id', 'asc')->get();
            @endphp
            <div class="schedule-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($rules as $rule)
                    <div class="match-card custom-match-card p-6 rounded-2xl shadow-lg border border-gray-200 flex flex-col gap-3 relative" style="min-width:200px;">
                        <div class="font-bold text-lg flex items-center gap-2 mb-1">
                            <span>{{ $rule->sport->sport_name ?? '-' }}</span>
                        </div>
                        <div class="text-gray-900 text-base font-semibold mb-1">{{ $rule->title }}</div>
                        <div class="text-gray-700 text-base mb-2">{{ $rule->description }}</div>
                        @if($rule->file_path)
                            <div class="mb-4 flex justify-center">
                                <iframe src="{{ asset('storage/'.$rule->file_path) }}#toolbar=0&navpanes=0&scrollbar=0&page=1" class="w-44 h-60 rounded shadow border" frameborder="0"></iframe>
                            </div>
                        @else
                            <div class="mb-4 flex justify-center">
                                <span class="text-gray-400">No PDF</span>
                            </div>
                        @endif
                        <div class="flex gap-2 mt-auto">
                            @if($rule->file_path)
                                <a href="{{ asset('storage/'.$rule->file_path) }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded font-bold flex-1 text-center">Preview</a>
                                <a href="{{ asset('storage/'.$rule->file_path) }}" download class="bg-green-600 text-white px-4 py-2 rounded font-bold flex-1 text-center">Download</a>
                            @else
                                <span class="text-gray-400">No PDF</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">No rules found.</div>
                @endforelse
            </div>
        </div>
        <!-- Scoreboard Card View Section -->
        <div x-show="tab === 'scoreboard'" class="schedule-section w-full max-w-full mx-auto px-2">
            <div class="schedule-header">Live Scoreboard</div>
            @php
                $overview = \App\Models\Team::all()->map(function($team) {
                    $gold = $team->scoreboards->sum('gold');
                    $silver = $team->scoreboards->sum('silver');
                    $bronze = $team->scoreboards->sum('bronze');
                    $total = $gold + $silver + $bronze;
                    return [
                        'team' => $team,
                        'gold' => $gold,
                        'silver' => $silver,
                        'bronze' => $bronze,
                        'total' => $total
                    ];
                })->sort(function($a, $b) {
                    if ($a['gold'] !== $b['gold']) {
                        return $b['gold'] <=> $a['gold'];
                    }
                    if ($a['silver'] !== $b['silver']) {
                        return $b['silver'] <=> $a['silver'];
                    }
                    if ($a['bronze'] !== $b['bronze']) {
                        return $b['bronze'] <=> $a['bronze'];
                    }
                    return $b['total'] <=> $a['total'];
                })->values();
            @endphp
            <div class="overflow-x-auto">
                <table class="scoreboard-table">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>🥇 Gold</th>
                            <th>🥈 Silver</th>
                            <th>🥉 Bronze</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($overview as $row)
                            <tr>
                                <td class="team-cell">
                                    @if($row['team']->photo)
                                    <img src="{{ asset('storage/' . $row['team']->photo) }}" alt="logo" class="team-logo" />
                                    @else
                                        <span class="inline-block team-logo bg-gray-200 border-gray-300"></span>
                                    @endif
                                    <span>{{ $row['team']->name }}</span>
                                </td>
                                <td class="gold">{{ $row['gold'] }}</td>
                                <td class="silver">{{ $row['silver'] }}</td>
                                <td class="bronze">{{ $row['bronze'] }}</td>
                                <td class="total">{{ $row['total'] }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-gray-500 py-8">No teams found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
function scheduleComponent() {
    return {
        viewType: 'grid',
        showFilter: false,
        filterSport: '',
        filterGender: '',
        sports: @json(\App\Models\Sport::all()),
        schedules: @json(\App\Models\Schedule::with(['sport', 'teamA', 'teamB'])->get()),
        get filteredSchedules() {
            // Filtering removed: always return all schedules
            return this.schedules;
        },
        get sortedSchedules() {
            // Sort all schedules by date/time
            return [...this.schedules].sort((a, b) => {
                const ad = new Date(a.match_date + ' ' + a.match_time);
                const bd = new Date(b.match_date + ' ' + b.match_time);
                return ad - bd;
            });
        }
    }
}
</script>
<!-- Rules Card View Section -->
    <div x-show="tab === 'rules'" class="schedule-section w-full max-w-full mx-auto px-2">
        <div class="schedule-header">Sport Rules</div>
        @php
            $rules = \App\Models\Rules::with('sport')->orderBy('created_at', 'desc')->get();
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            @forelse($rules as $rule)
                <div class="rule-card">
                    <div class="rule-sport">{{ $rule->sport->sport_name ?? '-' }}</div>
                    <div class="rule-title">{{ $rule->title }}</div>
                    <div class="rule-desc">{{ $rule->description }}</div>
                    @if($rule->file_path)
                        <div class="mb-4 flex justify-center">
                            <iframe src="{{ asset('storage/'.$rule->file_path) }}#toolbar=0&navpanes=0&scrollbar=0&page=1" class="w-70 h-70 rounded shadow border" frameborder="0"></iframe>
                        </div>
                    @else
                        <div class="mb-4 flex justify-center">
                            <span class="text-gray-400">No PDF</span>
                        </div>
                    @endif
                    <div class="rule-actions">
                        @if($rule->file_path)
                            <a href="{{ asset('storage/'.$rule->file_path) }}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded font-bold flex-1 text-center">Preview</a>
                            <a href="{{ asset('storage/'.$rule->file_path) }}" download class="bg-green-600 text-white px-4 py-2 rounded font-bold flex-1 text-center">Download</a>
                        @else
                            <span class="text-gray-400">No PDF</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">No rules found.</div>
            @endforelse
        </div>
    </div>
</body>
</html>