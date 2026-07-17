export function compressImage(file, maxW, maxH, quality, callback) {
    if (!file || !window.FileReader) { callback(null); return; }
    const reader = new FileReader();
    reader.onload = function (e) {
        const img = new Image();
        img.onload = function () {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            let w = img.width, h = img.height;
            if (w > h) { if (w > maxW) { h *= maxW / w; w = maxW; } }
            else { if (h > maxH) { w *= maxH / h; h = maxH; } }
            canvas.width = Math.round(w);
            canvas.height = Math.round(h);
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            canvas.toBlob(function (blob) {
                callback(blob);
            }, 'image/webp', quality);
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}