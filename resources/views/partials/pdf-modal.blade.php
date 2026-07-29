{{-- Global PDF Preview Modal --}}
<div id="pdf-modal" class="pdf-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="pdf-modal-title">
    <div class="pdf-modal-backdrop"></div>
    <div class="pdf-modal-content">
        <div class="pdf-modal-header">
            <div class="pdf-modal-title-wrap">
                <span class="pdf-modal-icon">
                    @include('partials.icon', ['name' => 'file'])
                </span>
                <div>
                    <h3 id="pdf-modal-title" class="pdf-modal-title">PDF Preview</h3>
                    <span class="pdf-modal-subtitle">Document Preview</span>
                </div>
            </div>
            <div class="pdf-modal-actions">
                <a id="pdf-modal-download" href="#" download class="btn btn-primary pdf-modal-download">
                    @include('partials.icon', ['name' => 'download'])
                    <span>Download PDF</span>
                </a>
                <button type="button" class="pdf-modal-close" aria-label="Close document preview">
                    @include('partials.icon', ['name' => 'close'])
                </button>
            </div>
        </div>
        <div class="pdf-modal-body">
            <iframe class="pdf-modal-iframe" src="about:blank" title="PDF Document Preview"></iframe>
        </div>
        <div class="pdf-modal-footer">
            <p class="pdf-modal-hint">Viewing document preview. Click <strong>Download PDF</strong> to save to your device.</p>
        </div>
    </div>
</div>
