<!-- Universal Toaster System -->
<script>
// ==================== UNIVERSAL TOASTER SYSTEM ====================
// This toaster system can be used across all authentication forms

class ToasterSystem {
    constructor() {
        // Wait for DOM to be ready before initializing
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                this.init();
            });
        } else {
            this.init();
        }
    }

    init() {
        // Check if body exists and toaster container doesn't exist
        if (document.body && !document.getElementById('toaster-container')) {
            const toasterContainer = document.createElement('div');
            toasterContainer.id = 'toaster-container';
            toasterContainer.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
                width: 100%;
            `;
            document.body.appendChild(toasterContainer);
        }
    }

    show(message, type = 'info', duration = 5000, loading = false) {
        // Ensure toaster container exists
        this.init();
        
        const toasterContainer = document.getElementById('toaster-container');
        if (!toasterContainer) {
            console.error('Toaster container not found');
            return null;
        }
        
        // Remove existing toasts
        const existingToasts = toasterContainer.querySelectorAll('.toast-item');
        existingToasts.forEach(toast => {
            if (toast.dataset.type !== 'loading') {
                toast.remove();
            }
        });

        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast-item toast-${type}`;
        toast.style.cssText = `
            background: ${this.getBackgroundColor(type)};
            color: ${this.getTextColor(type)};
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInRight 0.3s ease-out;
            position: relative;
            overflow: hidden;
        `;

        // Add icon
        const icon = document.createElement('span');
        icon.innerHTML = this.getIcon(type, loading);
        icon.style.cssText = `
            font-size: 18px;
            flex-shrink: 0;
        `;

        // Add message
        const messageElement = document.createElement('span');
        messageElement.textContent = message;
        messageElement.style.cssText = `
            flex: 1;
        `;

        // Add close button
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '×';
        closeBtn.style.cssText = `
            background: none;
            border: none;
            color: inherit;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            margin-left: 8px;
            opacity: 0.7;
            transition: opacity 0.2s;
        `;
        closeBtn.onmouseover = () => closeBtn.style.opacity = '1';
        closeBtn.onmouseout = () => closeBtn.style.opacity = '0.7';
        closeBtn.onclick = () => this.hide(toast);

        // Add progress bar for loading
        if (loading) {
            const progressBar = document.createElement('div');
            progressBar.style.cssText = `
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background: rgba(255,255,255,0.3);
                width: 100%;
                animation: progress 2s linear infinite;
            `;
            toast.appendChild(progressBar);
        }

        // Assemble toast
        toast.appendChild(icon);
        toast.appendChild(messageElement);
        if (!loading) {
            toast.appendChild(closeBtn);
        }

        // Add to container
        toasterContainer.appendChild(toast);

        // Auto remove after duration (except for loading toasts)
        if (!loading && duration > 0) {
            setTimeout(() => {
                this.hide(toast);
            }, duration);
        }

        return toast;
    }

    hide(toast) {
        if (toast && toast.parentNode) {
            toast.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
    }

    loading(message = 'Loading...') {
        return this.show(message, 'loading', 0, true);
    }

    success(message, duration = 5000) {
        return this.show(message, 'success', duration);
    }

    error(message, duration = 5000) {
        return this.show(message, 'error', duration);
    }

    warning(message, duration = 5000) {
        return this.show(message, 'warning', duration);
    }

    info(message, duration = 5000) {
        return this.show(message, 'info', duration);
    }

    getBackgroundColor(type) {
        const colors = {
            success: '#28a745',
            error: '#dc3545',
            warning: '#ffc107',
            info: '#17a2b8',
            loading: '#6c757d'
        };
        return colors[type] || colors.info;
    }

    getTextColor(type) {
        return type === 'warning' ? '#212529' : '#ffffff';
    }

    getIcon(type, loading = false) {
        if (loading) {
            return '<div class="spinner-border spinner-border-sm" role="status"></div>';
        }

        const icons = {
            success: '<i class="fas fa-check-circle"></i>',
            error: '<i class="fas fa-exclamation-circle"></i>',
            warning: '<i class="fas fa-exclamation-triangle"></i>',
            info: '<i class="fas fa-info-circle"></i>'
        };
        return icons[type] || icons.info;
    }
}

// Initialize toaster system when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.toaster = new ToasterSystem();
});

// Also initialize immediately if DOM is already loaded
if (document.readyState !== 'loading') {
    window.toaster = new ToasterSystem();
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    @keyframes progress {
        0% { width: 0%; }
        100% { width: 100%; }
    }

    .toast-item {
        transition: all 0.3s ease;
    }

    .toast-item:hover {
        transform: translateX(-5px);
    }
`;
document.head.appendChild(style);
</script>
