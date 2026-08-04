@extends('layouts.layout')
@section('title', 'Learning Hub - StudyNest')

@section('content')
<div class="container-fluid py-4 fade-in-down">
    <div class="text-center mb-5">
        <h2 class="fw-bold position-relative d-inline-block accent" style="color:var(--accent);">
            <i class="bi bi-journal-bookmark-fill me-2"></i> Learning Hub
            <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
        </h2>
        <p class="text-muted">Discover, search, and access shared study resources</p>
    </div>

    <div class="mb-5 d-flex justify-content-center">
        <form method="GET" action="{{ route('learning.hub') }}" class="w-100" style="max-width: 600px;">
            <div class="input-group shadow-sm rounded-pill overflow-hidden p-1 bg-white">
                <input
                    type="text"
                    name="search"
                    placeholder="Search books by title, author, or tags..."
                    value="{{ request('search') }}"
                    class="form-control border-0 px-4 py-2"
                    style="box-shadow: none !important;"
                >
                <button type="submit" class="btn btn-primary fw-bold px-4 rounded-pill">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    @if(isset($message))
        <div class="alert alert-warning text-center fw-semibold shadow-sm rounded-4">
            <i class="bi bi-exclamation-triangle me-2"></i> {{ $message }}
        </div>
    @elseif(isset($book) && $book)
        @php
            $tags = !empty($book->tags)
                ? (is_array($book->tags) ? $book->tags : explode(',', $book->tags))
                : [];
            $bookTitle = $book->title ?? $book->name ?? 'book';
        @endphp

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-surface border-0 shadow-sm rounded-4 overflow-hidden w-100 hover-card">
                    <div class="card-body p-4 d-flex flex-column">
                        <!-- Title -->
                        <div class="mb-3">
                            <h2 class="fw-bold mb-1" style="color:var(--accent);">
                                {{ $bookTitle }}
                            </h2>
                            <p class="text-muted small mb-0">{{ Str::limit(strip_tags($book->description ?? ''), 160) }}</p>
                        </div>

                        <!-- Metadata and tags -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-3">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center text-muted small mb-1">
                                    <i class="bi bi-person text-primary me-2"></i>
                                    <span class="fw-semibold me-1">Author:</span>
                                    <span>{{ $book->author ?? 'Unknown' }}</span>
                                </div>

                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-calendar-event text-primary me-2"></i>
                                    <span class="fw-semibold me-1">Uploaded:</span>
                                    <span>{{ $book->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column text-end">
                                <div class="d-flex justify-content-end flex-wrap">
                                    <i class="bi bi-tags text-primary me-2 align-self-center"></i>
                                    <div>
                                        @if(count($tags))
                                            @foreach($tags as $tag)
                                                @if(trim($tag) !== '')
                                                    <span class="badge bg-light text-primary border border-1 me-1 mb-1">
                                                        {{ trim($tag) }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        @else
                                            <span class="text-secondary opacity-50 fst-italic">No tags</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-2">

                        <!-- Controls -->
                        <div class="d-flex flex-column flex-sm-row gap-2 align-items-start align-items-sm-center mb-3">
                            <div class="d-flex align-items-center gap-2 reader-controls flex-wrap">
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Font</small>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="decrease-font" title="Decrease font">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="increase-font" title="Increase font">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Line</small>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="decrease-line" title="Tighter line-height">
                                        <i class="bi bi-arrows-collapse"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="increase-line" title="Looser line-height">
                                        <i class="bi bi-arrows-expand"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Mode</small>
                                    <select id="readingMode" class="form-select form-select-sm">
                                        <option value="light">Light</option>
                                        <option value="sepia">Sepia</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Width</small>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="narrow" title="Narrow column">
                                        <i class="bi bi-layout-text-sidebar-reverse"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm reader-btn" data-action="wide" title="Full width">
                                        <i class="bi bi-layout-text-window-reverse"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Columns</small>
                                    <button id="toggleColumns" class="btn btn-outline-secondary btn-sm" title="Toggle two-column reading">
                                        <i class="bi bi-columns-gap"></i>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-2 mb-0">Study</small>
                                    <button id="jumpToNotes" class="btn btn-outline-secondary btn-sm" title="Jump to notes">
                                        <i class="bi bi-journal-text"></i>
                                    </button>
                                    <button id="addNoteBtn" class="btn btn-outline-secondary btn-sm" title="Add note">
                                        <i class="bi bi-stickies"></i>
                                    </button>
                                    <button id="highlightBtn" class="btn btn-outline-warning btn-sm" title="Highlight selection">
                                        <i class="bi bi-highlighter"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="ms-auto d-flex gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="downloadDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-download me-1"></i> Download
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="downloadDropdown">
                                        <li><button class="dropdown-item" id="downloadHtmlBtn" type="button">Download as HTML</button></li>
                                        <li><button class="dropdown-item" id="downloadTextBtn" type="button">Download as Text</button></li>
                                        <li><button class="dropdown-item" id="downloadMdBtn" type="button">Download as Markdown</button></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><button class="dropdown-item" id="printBtn" type="button">Print / Save as PDF</button></li>
                                    </ul>
                                </div>

                                <button id="resetReader" class="btn btn-link small align-self-center">Reset</button>
                            </div>
                        </div>

                        <!-- Reader + Notes -->
                        <div class="mt-2 d-flex flex-column flex-lg-row gap-3">
                            <div id="readerPanel" class="flex-fill">
                                <div id="readerInner" class="book-description text-muted reader-content theme-light" tabindex="0" role="article" aria-label="Book content" data-book-title="{{ $bookTitle }}">
                                    {!! $book->description !!}
                                </div>
                            </div>

                            <aside id="notesPanel" class="bg-surface-1 p-3 rounded-3" style="min-width:260px; max-width:360px;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">Notes</h6>
                                    <button id="clearNotes" class="btn btn-sm btn-outline-secondary">Clear</button>
                                </div>

                                <div id="notesList" class="mb-3" style="max-height:360px; overflow:auto;">
                                    <!-- notes injected here -->
                                </div>

                                <div class="input-group">
                                    <input id="noteInput" type="text" class="form-control form-control-sm" placeholder="Write a quick note...">
                                    <button id="saveNote" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </aside>
                        </div>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    @else
        <div class="alert alert-info text-center fw-semibold shadow-sm rounded-4">
            <i class="bi bi-book me-2"></i> Open any book
        </div>
    @endif
</div>

<!-- Styles (keeps site tokens and reader styles) -->
<style>
:root{
    --site-font: 'Quicksand', sans-serif;
    --accent: #1E3A8A;
    --muted: #6b7280;
    --card-radius: 16px;
    --reader-max-width: 900px;
    --bg: #f8fafc;
    --card-bg: #ffffff;
    --surface-1: #f8fafc;
    --surface-2: #eef2ff;
    --text: #111827;
    --reader-highlight: #fff59d;
}

/* Base */
body, .container-fluid {
    font-family: var(--site-font);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-color: var(--bg);
    color: var(--text);
}

/* Card hover */
.hover-card {
    transition: transform 0.3s cubic-bezier(0.175,0.885,0.32,1.275), box-shadow 0.3s ease;
    border-radius: var(--card-radius);
}
.hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(30,58,138,0.12) !important;
}

/* Card body */
.card-body {
    background: linear-gradient(180deg, var(--card-bg) 0%, #fbfdff 100%);
}

/* Reader controls */
.reader-controls .reader-btn { min-width: 36px; display: inline-flex; align-items: center; justify-content: center; }
.reader-controls .form-select { min-width: 120px; }

/* Reader content */
.book-description {
    font-family: inherit;
    line-height: 1.8;
    font-size: 1rem;
    color: var(--text);
    transition: background-color 0.25s ease, color 0.25s ease;
    padding: 18px;
    border-radius: 10px;
    background: transparent;
    max-width: var(--reader-max-width);
    margin: 0 auto;
    box-sizing: border-box;
    letter-spacing: 0.01em;
    box-shadow: 0 6px 18px rgba(16,24,40,0.04);
    hyphens: auto;
}
.book-description img { max-width: 100%; height: auto; display: block; margin: 1rem auto; border-radius: 8px; }

/* Reader width modes */
.reader-narrow .book-description { max-width: 680px; font-size: 1.05rem; }
.reader-wide .book-description { max-width: 1100px; }

/* Two-column reading mode */
.two-column .book-description {
    column-count: 2;
    column-gap: 2rem;
    hyphens: auto;
}
@media (max-width: 991.98px) { .two-column .book-description { column-count: 1; } }

/* Theme-aware reading panel */
.theme-light .book-description { background: var(--card-bg); color: var(--text); }
.theme-sepia .book-description { background: #fbf1e6; color: #3b2f2f; }
.theme-dark .book-description { background: #0b1220; color: #e6eef8; }

/* Highlight */
.reader-highlight { background: var(--reader-highlight); padding: 0.05rem 0.15rem; border-radius: 3px; }

/* Notes panel */
#notesPanel { box-shadow: 0 6px 18px rgba(16,24,40,0.04); }
.note-item { background: rgba(255,255,255,0.6); padding: .5rem; border-radius: .4rem; margin-bottom: .5rem; font-size: .95rem; }

/* Badges */
.badge { font-weight: 600; font-size: 0.8rem; padding: 0.35rem 0.6rem; }

/* Reset link */
#resetReader { color: var(--accent); }

/* Accessibility focus */
.reader-content:focus { outline: 3px solid rgba(30,58,138,0.18); outline-offset: 4px; }

/* Responsive adjustments */
@media (max-width: 991.98px) {
    #notesPanel { max-width: 100%; min-width: 100%; order: 2; }
    #readerPanel { order: 1; }
    .card-body { padding: 1rem; }
}
@media (max-width: 576px) {
    .reader-controls { gap: 0.5rem; }
    .book-description { padding: 14px; font-size: 0.98rem; }
}
@media (min-width: 1200px) {
    .book-description { font-size: 1.05rem; line-height: 1.9; }
}

/* Print */
@media print {
    body * { visibility: hidden; }
    .book-description, .book-description * { visibility: visible; }
    .book-description { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; background: #fff; color: #000; }
    .reader-highlight { background: #ffff99 !important; color: #000 !important; }
}
</style>

<!-- Combined reader script (keeps functionality: controls, notes, highlights, downloads) -->
<script>
(function(){
    // Elements
    const readerContent = document.querySelector('.reader-content');
    const controls = document.querySelectorAll('.reader-btn');
    const readingModeSelect = document.getElementById('readingMode');
    const resetBtn = document.getElementById('resetReader');
    const toggleColumnsBtn = document.getElementById('toggleColumns');
    const jumpToNotesBtn = document.getElementById('jumpToNotes');
    const notesPanel = document.getElementById('notesPanel');
    const notesList = document.getElementById('notesList');
    const noteInput = document.getElementById('noteInput');
    const saveNoteBtn = document.getElementById('saveNote');
    const clearNotesBtn = document.getElementById('clearNotes');
    const addNoteBtn = document.getElementById('addNoteBtn');
    const highlightBtn = document.getElementById('highlightBtn');

    const downloadHtmlBtn = document.getElementById('downloadHtmlBtn');
    const downloadTextBtn = document.getElementById('downloadTextBtn');
    const downloadMdBtn = document.getElementById('downloadMdBtn');
    const printBtn = document.getElementById('printBtn');

    // Defaults and persisted state
    const defaults = { fontSize: 16, lineHeight: 1.8, mode: 'light', width: 'narrow', twoColumn: false };
    const persisted = JSON.parse(localStorage.getItem('study_reader_state') || '{}');
    const settings = {
        fontSize: persisted.fontSize || defaults.fontSize,
        lineHeight: persisted.lineHeight || defaults.lineHeight,
        mode: persisted.mode || defaults.mode,
        width: persisted.width || defaults.width,
        twoColumn: persisted.twoColumn || defaults.twoColumn
    };

    // Per-book storage keys (fallback)
    const bookKeySuffix = (document.querySelector('.reader-content')?.getAttribute('data-book-title') || 'book').replace(/\s+/g,'_').toLowerCase();
    const NOTES_KEY = 'study_notes_' + (window._study_book_key || bookKeySuffix);
    const HIGHLIGHTS_KEY = 'study_highlights_' + (window._study_book_key || bookKeySuffix);

    const MODE_TO_THEME = { light: 'theme-light', sepia: 'theme-sepia', dark: 'theme-dark' };

    /* Utilities */
    function saveSettings(){ localStorage.setItem('study_reader_state', JSON.stringify(settings)); }
    function slugify(text){ return String(text).toLowerCase().replace(/\s+/g,'-').replace(/[^\w\-]+/g,'').replace(/\-\-+/g,'-').replace(/^-+/,'').replace(/-+$/,''); }
    function escapeHtml(unsafe){ return String(unsafe).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;"); }
    function downloadBlob(filename, blob){ const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = filename; document.body.appendChild(a); a.click(); a.remove(); setTimeout(()=>URL.revokeObjectURL(url),1000); }
    function getBookTitle(){ const el = document.querySelector('.reader-content'); return el ? (el.getAttribute('data-book-title') || document.title || 'book') : 'book'; }

    /* Apply settings */
    function applySettings(){
        if(!readerContent) return;
        readerContent.style.fontSize = settings.fontSize + 'px';
        readerContent.style.lineHeight = settings.lineHeight;
        document.body.classList.remove('reader-narrow','reader-wide');
        document.body.classList.add(settings.width === 'wide' ? 'reader-wide' : 'reader-narrow');

        if(settings.twoColumn) readerContent.classList.add('two-column'); else readerContent.classList.remove('two-column');

        const themeClass = MODE_TO_THEME[settings.mode] || MODE_TO_THEME.light;
        if(window.SiteTheme && typeof window.SiteTheme.set === 'function'){
            window.SiteTheme.set(themeClass);
        } else {
            document.documentElement.classList.remove('theme-light','theme-sepia','theme-dark');
            document.documentElement.classList.add(themeClass);
            document.body.classList.remove('theme-light','theme-sepia','theme-dark');
            document.body.classList.add(themeClass);
            localStorage.setItem('site_theme', themeClass);
        }

        if(readingModeSelect) readingModeSelect.value = settings.mode;
        if(toggleColumnsBtn) toggleColumnsBtn.classList.toggle('active', settings.twoColumn);
    }

    /* Font & line handlers */
    function changeFont(delta){ settings.fontSize = Math.max(13, Math.min(28, settings.fontSize + delta)); applySettings(); saveSettings(); }
    function changeLine(delta){ settings.lineHeight = Math.max(1.2, Math.min(2.6, +(settings.lineHeight + delta).toFixed(2))); applySettings(); saveSettings(); }

    /* Notes */
    function loadNotes(){
        if(!notesList) return;
        const raw = localStorage.getItem(NOTES_KEY);
        const notes = raw ? JSON.parse(raw) : [];
        notesList.innerHTML = '';
        notes.forEach((n, idx) => {
            const div = document.createElement('div');
            div.className = 'note-item';
            div.innerHTML = `<div class="d-flex justify-content-between align-items-start"><div class="me-2">${escapeHtml(n.text)}</div><div><button class="btn btn-sm btn-outline-secondary remove-note" data-idx="${idx}" aria-label="Remove note"><i class="bi bi-x"></i></button></div></div><div class="text-muted small mt-1">${escapeHtml(n.time)}</div>`;
            notesList.appendChild(div);
        });
        notesList.querySelectorAll('.remove-note').forEach(btn => btn.addEventListener('click', function(){ removeNote(parseInt(this.getAttribute('data-idx'))); }));
    }
    function saveNote(text){ if(!text || !text.trim()) return; const raw = localStorage.getItem(NOTES_KEY); const notes = raw ? JSON.parse(raw) : []; notes.unshift({ text: text.trim(), time: new Date().toLocaleString() }); localStorage.setItem(NOTES_KEY, JSON.stringify(notes)); loadNotes(); if(noteInput) noteInput.value = ''; }
    function removeNote(idx){ const raw = localStorage.getItem(NOTES_KEY); const notes = raw ? JSON.parse(raw) : []; notes.splice(idx,1); localStorage.setItem(NOTES_KEY, JSON.stringify(notes)); loadNotes(); }
    function clearNotes(){ localStorage.removeItem(NOTES_KEY); loadNotes(); }

    /* Highlights */
    function saveHighlights(){ if(!readerContent) return; localStorage.setItem(HIGHLIGHTS_KEY, readerContent.innerHTML); }
    function loadHighlights(){ const raw = localStorage.getItem(HIGHLIGHTS_KEY); if(raw && readerContent) readerContent.innerHTML = raw; }
    function highlightSelection(){
        const sel = window.getSelection();
        if(!sel || sel.isCollapsed) return;
        const range = sel.getRangeAt(0);
        if(!readerContent.contains(range.commonAncestorContainer)) return;
        const span = document.createElement('span'); span.className = 'reader-highlight';
        try { range.surroundContents(span); sel.removeAllRanges(); saveHighlights(); }
        catch(err){ const content = range.extractContents(); span.appendChild(content); range.insertNode(span); sel.removeAllRanges(); saveHighlights(); }
    }

    /* Downloads & print */
    function downloadAsHTML(){
        if(!readerContent) return;
        const title = getBookTitle();
        const accent = getComputedStyle(document.documentElement).getPropertyValue('--accent') || '#1E3A8A';
        const html = `<!doctype html><html><head><meta charset="utf-8"><title>${escapeHtml(title)}</title><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"><style>body{font-family:'Quicksand',sans-serif;padding:24px;color:#111827;background:#fff;}img{max-width:100%;height:auto;}h1{color:${accent.trim()};}</style></head><body><h1>${escapeHtml(title)}</h1>${readerContent.innerHTML}</body></html>`;
        downloadBlob(`${slugify(title)}.html`, new Blob([html], { type: 'text/html;charset=utf-8' }));
    }
    function downloadAsText(){ if(!readerContent) return; const title = getBookTitle(); const text = `${title}\n\n${readerContent.innerText.trim()}`; downloadBlob(`${slugify(title)}.txt`, new Blob([text], { type: 'text/plain;charset=utf-8' })); }
    function downloadAsMarkdown(){ if(!readerContent) return; const title = getBookTitle(); const md = `# ${title}\n\n${readerContent.innerText.trim()}`; downloadBlob(`${slugify(title)}.md`, new Blob([md], { type: 'text/markdown;charset=utf-8' })); }

    /* Wire UI */
    if(controls && controls.length) controls.forEach(btn => btn.addEventListener('click', function(){ const action = this.getAttribute('data-action'); if(!action) return; if(action==='increase-font') changeFont(1); if(action==='decrease-font') changeFont(-1); if(action==='increase-line') changeLine(0.1); if(action==='decrease-line') changeLine(-0.1); if(action==='narrow'){ settings.width='narrow'; applySettings(); saveSettings(); } if(action==='wide'){ settings.width='wide'; applySettings(); saveSettings(); } }));
    if(readingModeSelect) readingModeSelect.addEventListener('change', function(){ const val = this.value || 'light'; settings.mode = (['light','sepia','dark'].includes(val) ? val : 'light'); applySettings(); saveSettings(); });
    if(resetBtn) resetBtn.addEventListener('click', function(e){ e.preventDefault(); Object.assign(settings, defaults); applySettings(); saveSettings(); });
    if(toggleColumnsBtn) { toggleColumnsBtn.addEventListener('click', function(){ settings.twoColumn = !settings.twoColumn; applySettings(); saveSettings(); this.classList.toggle('active', settings.twoColumn); }); toggleColumnsBtn.classList.toggle('active', settings.twoColumn); }
    if(saveNoteBtn) saveNoteBtn.addEventListener('click', function(){ saveNote(noteInput.value); });
    if(noteInput) noteInput.addEventListener('keydown', function(e){ if(e.key==='Enter'){ e.preventDefault(); saveNote(noteInput.value); }});
    if(clearNotesBtn) clearNotesBtn.addEventListener('click', clearNotes);
    if(addNoteBtn) addNoteBtn.addEventListener('click', function(){ if(noteInput) noteInput.focus(); });
    if(jumpToNotesBtn) jumpToNotesBtn.addEventListener('click', function(){ if(notesPanel){ notesPanel.scrollIntoView({ behavior:'smooth', block:'center' }); if(noteInput) noteInput.focus(); }});
    if(highlightBtn) highlightBtn.addEventListener('click', function(){ highlightSelection(); });
    if(downloadHtmlBtn) downloadHtmlBtn.addEventListener('click', downloadAsHTML);
    if(downloadTextBtn) downloadTextBtn.addEventListener('click', downloadAsText);
    if(downloadMdBtn) downloadMdBtn.addEventListener('click', downloadAsMarkdown);
    if(printBtn) printBtn.addEventListener('click', function(){ window.print(); });

    if(readerContent) {
        readerContent.addEventListener('keydown', function(e){
            if(e.key === '+' || e.key === '='){ changeFont(1); e.preventDefault(); }
            if(e.key === '-') { changeFont(-1); e.preventDefault(); }
        });
    }

    /* Init */
    document.querySelectorAll('.reader-content img').forEach(img => { img.removeAttribute('width'); img.removeAttribute('height'); img.style.maxWidth = '100%'; img.style.height = 'auto'; });
    loadNotes();
    loadHighlights();
    applySettings();

    if(window.innerWidth < 768){
        const firstHeading = document.querySelector('.book-title-overlay h3');
        if(firstHeading) setTimeout(()=> firstHeading.scrollIntoView({ behavior:'smooth', block:'center' }), 300);
    }
})();
</script>
@endsection