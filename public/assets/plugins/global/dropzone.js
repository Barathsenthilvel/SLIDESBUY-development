/* WEBPACK VAR INJECTION */
(function(module) {

    function _typeof(obj) {
        "@babel/helpers - typeof";
        if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
            _typeof = function _typeof(obj) {
                return typeof obj;
            };
        } else {
            _typeof = function _typeof(obj) {
                return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
            };
        }
        return _typeof(obj);
    }

    function _inherits(subClass, superClass) {
        if (typeof superClass !== "function" && superClass !== null) {
            throw new TypeError("Super expression must either be null or a function");
        }
        subClass.prototype = Object.create(superClass && superClass.prototype, {
            constructor: {
                value: subClass,
                writable: true,
                configurable: true
            }
        });
        if (superClass) _setPrototypeOf(subClass, superClass);
    }

    function _setPrototypeOf(o, p) {
        _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
            o.__proto__ = p;
            return o;
        };
        return _setPrototypeOf(o, p);
    }

    function _createSuper(Derived) {
        var hasNativeReflectConstruct = _isNativeReflectConstruct();
        return function _createSuperInternal() {
            var Super = _getPrototypeOf(Derived),
                result;
            if (hasNativeReflectConstruct) {
                var NewTarget = _getPrototypeOf(this).constructor;
                result = Reflect.construct(Super, arguments, NewTarget);
            } else {
                result = Super.apply(this, arguments);
            }
            return _possibleConstructorReturn(this, result);
        };
    }

    function _possibleConstructorReturn(self, call) {
        if (call && (_typeof(call) === "object" || typeof call === "function")) {
            return call;
        }
        return _assertThisInitialized(self);
    }

    function _assertThisInitialized(self) {
        if (self === void 0) {
            throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        }
        return self;
    }

    function _isNativeReflectConstruct() {
        if (typeof Reflect === "undefined" || !Reflect.construct) return false;
        if (Reflect.construct.sham) return false;
        if (typeof Proxy === "function") return true;
        try {
            Date.prototype.toString.call(Reflect.construct(Date, [], function() {}));
            return true;
        } catch (e) {
            return false;
        }
    }

    function _getPrototypeOf(o) {
        _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
            return o.__proto__ || Object.getPrototypeOf(o);
        };
        return _getPrototypeOf(o);
    }

    function _createForOfIteratorHelper(o, allowArrayLike) {
        var it;
        if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) {
            if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") {
                if (it) o = it;
                var i = 0;
                var F = function F() {};
                return {
                    s: F,
                    n: function n() {
                        if (i >= o.length) return {
                            done: true
                        };
                        return {
                            done: false,
                            value: o[i++]
                        };
                    },
                    e: function e(_e) {
                        throw _e;
                    },
                    f: F
                };
            }
            throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
        }
        var normalCompletion = true,
            didErr = false,
            err;
        return {
            s: function s() {
                it = o[Symbol.iterator]();
            },
            n: function n() {
                var step = it.next();
                normalCompletion = step.done;
                return step;
            },
            e: function e(_e2) {
                didErr = true;
                err = _e2;
            },
            f: function f() {
                try {
                    if (!normalCompletion && it["return"] != null) it["return"]();
                } finally {
                    if (didErr) throw err;
                }
            }
        };
    }

    function _unsupportedIterableToArray(o, minLen) {
        if (!o) return;
        if (typeof o === "string") return _arrayLikeToArray(o, minLen);
        var n = Object.prototype.toString.call(o).slice(8, -1);
        if (n === "Object" && o.constructor) n = o.constructor.name;
        if (n === "Map" || n === "Set") return Array.from(o);
        if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
    }

    function _arrayLikeToArray(arr, len) {
        if (len == null || len > arr.length) len = arr.length;
        for (var i = 0, arr2 = new Array(len); i < len; i++) {
            arr2[i] = arr[i];
        }
        return arr2;
    }

    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function");
        }
    }

    function _defineProperties(target, props) {
        for (var i = 0; i < props.length; i++) {
            var descriptor = props[i];
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ("value" in descriptor) descriptor.writable = true;
            Object.defineProperty(target, descriptor.key, descriptor);
        }
    }

    function _createClass(Constructor, protoProps, staticProps) {
        if (protoProps) _defineProperties(Constructor.prototype, protoProps);
        if (staticProps) _defineProperties(Constructor, staticProps);
        return Constructor;
    }

    /*
     *
     * More info at [www.dropzonejs.com](http://www.dropzonejs.com)
     *
     * Copyright (c) 2012, Matias Meno
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy
     * of this software and associated documentation files (the "Software"), to deal
     * in the Software without restriction, including without limitation the rights
     * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
     * copies of the Software, and to permit persons to whom the Software is
     * furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in
     * all copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
     * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
     * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
     * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
     * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
     * THE SOFTWARE.
     *
     */
    // The Emitter class provides the ability to call `.on()` on Dropzone to listen
    // to events.
    // It is strongly based on component's emitter class, and I removed the
    // functionality because of the dependency hell with different frameworks.
    var Emitter = /*#__PURE__*/ function() {
        function Emitter() {
            _classCallCheck(this, Emitter);
        }

        _createClass(Emitter, [{
            key: "on",
            // Add an event listener for given event
            value: function on(event, fn) {
                this._callbacks = this._callbacks || {}; // Create namespace for this event

                if (!this._callbacks[event]) {
                    this._callbacks[event] = [];
                }

                this._callbacks[event].push(fn);

                return this;
            }
        }, {
            key: "emit",
            value: function emit(event) {
                this._callbacks = this._callbacks || {};
                var callbacks = this._callbacks[event];

                if (callbacks) {
                    for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
                        args[_key - 1] = arguments[_key];
                    }

                    var _iterator = _createForOfIteratorHelper(callbacks),
                        _step;

                    try {
                        for (_iterator.s(); !(_step = _iterator.n()).done;) {
                            var callback = _step.value;
                            callback.apply(this, args);
                        }
                    } catch (err) {
                        _iterator.e(err);
                    } finally {
                        _iterator.f();
                    }
                }

                return this;
            } // Remove event listener for given event. If fn is not provided, all event
            // listeners for that event will be removed. If neither is provided, all
            // event listeners will be removed.

        }, {
            key: "off",
            value: function off(event, fn) {
                if (!this._callbacks || arguments.length === 0) {
                    this._callbacks = {};
                    return this;
                } // specific event


                var callbacks = this._callbacks[event];

                if (!callbacks) {
                    return this;
                } // remove all handlers


                if (arguments.length === 1) {
                    delete this._callbacks[event];
                    return this;
                } // remove specific handler


                for (var i = 0; i < callbacks.length; i++) {
                    var callback = callbacks[i];

                    if (callback === fn) {
                        callbacks.splice(i, 1);
                        break;
                    }
                }

                return this;
            }
        }]);

        return Emitter;
    }();

    var Dropzone = /*#__PURE__*/ function(_Emitter) {
        _inherits(Dropzone, _Emitter);

        var _super = _createSuper(Dropzone);

        _createClass(Dropzone, null, [{
            key: "initClass",
            value: function initClass() {
                // Exposing the emitter class, mainly for tests
                this.prototype.Emitter = Emitter;
                /*
       This is a list of all available events you can register on a dropzone object.
        You can register an event handler like this:
        dropzone.on("dragEnter", function() { });
        */

                this.prototype.events = ["drop", "dragstart", "dragend", "dragenter", "dragover", "dragleave", "addedfile", "addedfiles", "removedfile", "thumbnail", "error", "errormultiple", "processing", "processingmultiple", "uploadprogress", "totaluploadprogress", "sending", "sendingmultiple", "success", "successmultiple", "canceled", "canceledmultiple", "complete", "completemultiple", "reset", "maxfilesexceeded", "maxfilesreached", "queuecomplete"];
                this.prototype.defaultOptions = {
                    /**
                     * Has to be specified on elements other than form (or when the form
                     * doesn't have an `action` attribute). You can also
                     * provide a function that will be called with `files` and
                     * must return the url (since `v3.12.0`)
                     */
                    url: null,

                    /**
                     * Can be changed to `"put"` if necessary. You can also provide a function
                     * that will be called with `files` and must return the method (since `v3.12.0`).
                     */
                    method: "post",

                    /**
                     * Will be set on the XHRequest.
                     */
                    withCredentials: false,

                    /**
                     * The timeout for the XHR requests in milliseconds (since `v4.4.0`).
                     */
                    timeout: 30000,

                    /**
                     * How many file uploads to process in parallel (See the
                     * Enqueuing file uploads documentation section for more info)
                     */
                    parallelUploads: 2,

                    /**
                     * Whether to send multiple files in one request. If
                     * this it set to true, then the fallback file input element will
                     * have the `multiple` attribute as well. This option will
                     * also trigger additional events (like `processingmultiple`). See the events
                     * documentation section for more information.
                     */
                    uploadMultiple: false,

                    /**
                     * Whether you want files to be uploaded in chunks to your server. This can't be
                     * used in combination with `uploadMultiple`.
                     *
                     * See [chunksUploaded](#config-chunksUploaded) for the callback to finalise an upload.
                     */
                    chunking: false,

                    /**
                     * If `chunking` is enabled, this defines whether **every** file should be chunked,
                     * even if the file size is below chunkSize. This means, that the additional chunk
                     * form data will be submitted and the `chunksUploaded` callback will be invoked.
                     */
                    forceChunking: false,

                    /**
                     * If `chunking` is `true`, then this defines the chunk size in bytes.
                     */
                    chunkSize: 2000000,

                    /**
                     * If `true`, the individual chunks of a file are being uploaded simultaneously.
                     */
                    parallelChunkUploads: false,

                    /**
                     * Whether a chunk should be retried if it fails.
                     */
                    retryChunks: false,

                    /**
                     * If `retryChunks` is true, how many times should it be retried.
                     */
                    retryChunksLimit: 3,

                    /**
                     * If not `null` defines how many files this Dropzone handles. If it exceeds,
                     * the event `maxfilesexceeded` will be called. The dropzone element gets the
                     * class `dz-max-files-reached` accordingly so you can provide visual feedback.
                     */
                    maxFilesize: 256,

                    /**
                     * The name of the file param that gets transferred.
                     * **NOTE**: If you have the option  `uploadMultiple` set to `true`, then
                     * Dropzone will append `[]` to the name.
                     */
                    paramName: "file",

                    /**
                     * Whether thumbnails for images should be generated
                     */
                    createImageThumbnails: true,

                    /**
                     * In MB. When the filename exceeds this limit, the thumbnail will not be generated.
                     */
                    maxThumbnailFilesize: 10,

                    /**
                     * If `null`, the ratio of the image will be used to calculate it.
                     */
                    thumbnailWidth: 120,

                    /**
                     * The same as `thumbnailWidth`. If both are null, images will not be resized.
                     */
                    thumbnailHeight: 120,

                    /**
                     * How the images should be scaled down in case both, `thumbnailWidth` and `thumbnailHeight` are provided.
                     * Can be either `contain` or `crop`.
                     */
                    thumbnailMethod: 'crop',

                    /**
                     * If set, images will be resized to these dimensions before being **uploaded**.
                     * If only one, `resizeWidth` **or** `resizeHeight` is provided, the original aspect
                     * ratio of the file will be preserved.
                     *
                     * The `options.transformFile` function uses these options, so if the `transformFile` function
                     * is overridden, these options don't do anything.
                     */
                    resizeWidth: null,

                    /**
                     * See `resizeWidth`.
                     */
                    resizeHeight: null,

                    /**
                     * The mime type of the resized image (before it gets uploaded to the server).
                     * If `null` the original mime type will be used. To force jpeg, for example, use `image/jpeg`.
                     * See `resizeWidth` for more information.
                     */
                    resizeMimeType: null,

                    /**
                     * The quality of the resized images. See `resizeWidth`.
                     */
                    resizeQuality: 0.8,

                    /**
                     * How the images should be scaled down in case both, `resizeWidth` and `resizeHeight` are provided.
                     * Can be either `contain` or `crop`.
                     */
                    resizeMethod: 'contain',

                    /**
                     * The base that is used to calculate the filesize. You can change this to
                     * 1024 if you would rather display kibibytes, mebibytes, etc...
                     * 1024 is technically incorrect, because `1024 bytes` are `1 kibibyte` not `1 kilobyte`.
                     * You can change this to `1024` if you don't care about validity.
                     */
                    filesizeBase: 1000,

                    /**
                     * Can be used to limit the maximum number of files that will be handled by this Dropzone
                     */
                    maxFiles: null,

                    /**
                     * An optional object to send additional headers to the server. Eg:
                     * `{ "My-Awesome-Header": "header value" }`
                     */
                    headers: null,

                    /**
                     * If `true`, the dropzone element itself will be clickable, if `false`
                     * nothing will be clickable.
                     *
                     * You can also pass an HTML element, a CSS selector (for multiple elements)
                     * or an array of those. In that case, all of those elements will trigger an
                     * upload when clicked.
                     */
                    clickable: true,

                    /**
                     * Whether hidden files in directories should be ignored.
                     */
                    ignoreHiddenFiles: true,

                    /**
                     * The default implementation of `accept` checks the file's mime type or
                     * extension against this list. This is a comma separated list of mime
                     * types or file extensions.
                     *
                     * Eg.: `image/*,application/pdf,.psd`
                     *
                     * If the Dropzone is `clickable` this option will also be used as
                     * [`accept`](https://developer.mozilla.org/en-US/docs/HTML/Element/input#attr-accept)
                     * parameter on the hidden file input as well.
                     */
                    acceptedFiles: null,

                    /**
                     * **Deprecated!**
                     * Use acceptedFiles instead.
                     */
                    acceptedMimeTypes: null,

                    /**
                     * If false, files will be added to the queue but the queue will not be
                     * processed automatically.
                     * This can be useful if you need some additional user input before sending
                     * files (or if you want want all files sent at once).
                     * If you're ready to send the file simply call `myDropzone.processQueue()`.
                     *
                     * See the [enqueuing file uploads](#enqueuing-file-uploads) documentation
                     * section for more information.
                     */
                    autoProcessQueue: true,

                    /**
                     * If false, files added to the dropzone will not be queued by default.
                     * You'll have to call `enqueueFile(file)` manually.
                     */
                    autoQueue: true,

                    /**
                     * If `true`, this will add a link to every file preview to remove or cancel (if
                     * already uploading) the file. The `dictCancelUpload`, `dictCancelUploadConfirmation`
                     * and `dictRemoveFile` options are used for the wording.
                     */
                    addRemoveLinks: false,

                    /**
                     * Defines where to display the file previews – if `null` the
                     * Dropzone element itself is used. Can be a plain `HTMLElement` or a CSS
                     * selector. The element should have the `dropzone-previews` class so
                     * the previews are displayed properly.
                     */
                    previewsContainer: null,

                    /**
                     * This is the element the hidden input field (which is used when clicking on the
                     * dropzone to trigger file selection) will be appended to. This might
                     * be important in case you use frameworks to switch the content of your page.
                     *
                     * Can be a selector string, or an element directly.
                     */
                    hiddenInputContainer: "body",

                    /**
                     * If null, no capture type will be specified
                     * If camera, mobile devices will skip the file selection and choose camera
                     * If microphone, mobile devices will skip the file selection and choose the microphone
                     * If camcorder, mobile devices will skip the file selection and choose the camera in video mode
                     * On apple devices multiple must be set to false.  AcceptedFiles may need to
                     * be set to an appropriate mime type (e.g. "image/*", "audio/*", or "video/*").
                     */
                    capture: null,

                    /**
                     * **Deprecated**. Use `renameFile` instead.
                     */
                    renameFilename: null,

                    /**
                     * A function that is invoked before the file is uploaded to the server and renames the file.
                     * This function gets the `File` as argument and can use the `file.name`. The actual name of the
                     * file that gets used during the upload can be accessed through `file.upload.filename`.
                     */
                    renameFile: null,

                    /**
                     * If `true` the fallback will be forced. This is very useful to test your server
                     * implementations first and make sure that everything works as
                     * expected without dropzone if you experience problems, and to test
                     * how your fallbacks will look.
                     */
                    forceFallback: false,

                    /**
                     * The text used before any files are dropped.
                     */
                    dictDefaultMessage: "Drop files here to upload",

                    /**
                     * The text that replaces the default message text it the browser is not supported.
                     */
                    dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",

                    /**
                     * The text that will be added before the fallback form.
                     * If you provide a  fallback element yourself, or if this option is `null` this will
                     * be ignored.
                     */
                    dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",

                    /**
                     * If the filesize is too big.
                     * `{{filesize}}` and `{{maxFilesize}}` will be replaced with the respective configuration values.
                     */
                    dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",

                    /**
                     * If the file doesn't match the file type.
                     */
                    dictInvalidFileType: "You can't upload files of this type.",

                    /**
                     * If the server response was invalid.
                     * `{{statusCode}}` will be replaced with the servers status code.
                     */
                    dictResponseError: "Server responded with {{statusCode}} code.",

                    /**
                     * If `addRemoveLinks` is true, the text to be used for the cancel upload link.
                     */
                    dictCancelUpload: "Cancel upload",

                    /**
                     * The text that is displayed if an upload was manually canceled
                     */
                    dictUploadCanceled: "Upload canceled.",

                    /**
                     * If `addRemoveLinks` is true, the text to be used for confirmation when cancelling upload.
                     */
                    dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",

                    /**
                     * If `addRemoveLinks` is true, the text to be used to remove a file.
                     */
                    dictRemoveFile: "Remove file",

                    /**
                     * If this is not null, then the user will be prompted before removing a file.
                     */
                    dictRemoveFileConfirmation: null,

                    /**
                     * Displayed if `maxFiles` is st and exceeded.
                     * The string `{{maxFiles}}` will be replaced by the configuration value.
                     */
                    dictMaxFilesExceeded: "You can not upload any more files.",

                    /**
                     * Allows you to translate the different units. Starting with `tb` for terabytes and going down to
                     * `b` for bytes.
                     */
                    dictFileSizeUnits: {
                        tb: "TB",
                        gb: "GB",
                        mb: "MB",
                        kb: "KB",
                        b: "b"
                    },

                    /**
                     * Called when dropzone initialized
                     * You can add event listeners here
                     */
                    init: function init() {},

                    /**
                     * Can be an **object** of additional parameters to transfer to the server, **or** a `Function`
                     * that gets invoked with the `files`, `xhr` and, if it's a chunked upload, `chunk` arguments. In case
                     * of a function, this needs to return a map.
                     *
                     * The default implementation does nothing for normal uploads, but adds relevant information for
                     * chunked uploads.
                     *
                     * This is the same as adding hidden input fields in the form element.
                     */
                    params: function params(files, xhr, chunk) {
                        if (chunk) {
                            return {
                                dzuuid: chunk.file.upload.uuid,
                                dzchunkindex: chunk.index,
                                dztotalfilesize: chunk.file.size,
                                dzchunksize: this.options.chunkSize,
                                dztotalchunkcount: chunk.file.upload.totalChunkCount,
                                dzchunkbyteoffset: chunk.index * this.options.chunkSize
                            };
                        }
                    },

                    /**
                     * A function that gets a [file](https://developer.mozilla.org/en-US/docs/DOM/File)
                     * and a `done` function as parameters.
                     *
                     * If the done function is invoked without arguments, the file is "accepted" and will
                     * be processed. If you pass an error message, the file is rejected, and the error
                     * message will be displayed.
                     * This function will not be called if the file is too big or doesn't match the mime types.
                     */
                    accept: function accept(file, done) {
                        return done();
                    },

                    /**
                     * The callback that will be invoked when all chunks have been uploaded for a file.
                     * It gets the file for which the chunks have been uploaded as the first parameter,
                     * and the `done` function as second. `done()` needs to be invoked when everything
                     * needed to finish the upload process is done.
                     */
                    chunksUploaded: function chunksUploaded(file, done) {
                        done();
                    },

                    /**
                     * Gets called when the browser is not supported.
                     * The default implementation shows the fallback input field and adds
                     * a text.
                     */
                    fallback: function fallback() {
                        // This code should pass in IE7... :(
                        var messageElement;
                        this.element.className = "".concat(this.element.className, " dz-browser-not-supported");

                        var _iterator2 = _createForOfIteratorHelper(this.element.getElementsByTagName("div")),
                            _step2;

                        try {
                            for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
                                var child = _step2.value;

                                if (/(^| )dz-message($| )/.test(child.className)) {
                                    messageElement = child;
                                    child.className = "dz-message"; // Removes the 'dz-default' class

                                    break;
                                }
                            }
                        } catch (err) {
                            _iterator2.e(err);
                        } finally {
                            _iterator2.f();
                        }

                        if (!messageElement) {
                            messageElement = Dropzone.createElement("<div class=\"dz-message\"><span></span></div>");
                            this.element.appendChild(messageElement);
                        }

                        var span = messageElement.getElementsByTagName("span")[0];

                        if (span) {
                            if (span.textContent != null) {
                                span.textContent = this.options.dictFallbackMessage;
                            } else if (span.innerText != null) {
                                span.innerText = this.options.dictFallbackMessage;
                            }
                        }

                        return this.element.appendChild(this.getFallbackForm());
                    },

                    /**
                     * Gets called to calculate the thumbnail dimensions.
                     *
                     * It gets `file`, `width` and `height` (both may be `null`) as parameters and must return an object containing:
                     *
                     *  - `srcWidth` & `srcHeight` (required)
                     *  - `trgWidth` & `trgHeight` (required)
                     *  - `srcX` & `srcY` (optional, default `0`)
                     *  - `trgX` & `trgY` (optional, default `0`)
                     *
                     * Those values are going to be used by `ctx.drawImage()`.
                     */
                    resize: function resize(file, width, height, resizeMethod) {
                        var info = {
                            srcX: 0,
                            srcY: 0,
                            srcWidth: file.width,
                            srcHeight: file.height
                        };
                        var srcRatio = file.width / file.height; // Automatically calculate dimensions if not specified

                        if (width == null && height == null) {
                            width = info.srcWidth;
                            height = info.srcHeight;
                        } else if (width == null) {
                            width = height * srcRatio;
                        } else if (height == null) {
                            height = width / srcRatio;
                        } // Make sure images aren't upscaled


                        width = Math.min(width, info.srcWidth);
                        height = Math.min(height, info.srcHeight);
                        var trgRatio = width / height;

                        if (info.srcWidth > width || info.srcHeight > height) {
                            // Image is bigger and needs rescaling
                            if (resizeMethod === 'crop') {
                                if (srcRatio > trgRatio) {
                                    info.srcHeight = file.height;
                                    info.srcWidth = info.srcHeight * trgRatio;
                                } else {
                                    info.srcWidth = file.width;
                                    info.srcHeight = info.srcWidth / trgRatio;
                                }
                            } else if (resizeMethod === 'contain') {
                                // Method 'contain'
                                if (srcRatio > trgRatio) {
                                    height = width / srcRatio;
                                } else {
                                    width = height * srcRatio;
                                }
                            } else {
                                throw new Error("Unknown resizeMethod '".concat(resizeMethod, "'"));
                            }
                        }

                        info.srcX = (file.width - info.srcWidth) / 2;
                        info.srcY = (file.height - info.srcHeight) / 2;
                        info.trgWidth = width;
                        info.trgHeight = height;
                        return info;
                    },

                    /**
                     * Can be used to transform the file (for example, resize an image if necessary).
                     *
                     * The default implementation uses `resizeWidth` and `resizeHeight` (if provided) and resizes
                     * images according to those dimensions.
                     *
                     * Gets the `file` as the first parameter, and a `done()` function as the second, that needs
                     * to be invoked with the file when the transformation is done.
                     */
                    transformFile: function transformFile(file, done) {
                        if ((this.options.resizeWidth || this.options.resizeHeight) && file.type.match(/image.*/)) {
                            return this.resizeImage(file, this.options.resizeWidth, this.options.resizeHeight, this.options.resizeMethod, done);
                        } else {
                            return done(file);
                        }
                    },

                    /**
                     * A string that contains the template used for each dropped
                     * file. Change it to fulfill your needs but make sure to properly
                     * provide all elements.
                     *
                     * If you want to use an actual HTML element instead of providing a String
                     * as a config option, you could create a div with the id `tpl`,
                     * put the template inside it and provide the element like this:
                     *
                     *     document
                     *       .querySelector('#tpl')
                     *       .innerHTML
                     *
                     */
                    previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-image\"><img data-dz-thumbnail /></div>\n  <div class=\"dz-details\">\n    <div class=\"dz-size\"><span data-dz-size></span></div>\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n  </div>\n  <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n  <div class=\"dz-success-mark\">\n    <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">\n      <title>Check</title>\n      <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <path d=\"M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\" stroke-opacity=\"0.198794158\" stroke=\"#747474\" fill-opacity=\"0.816519475\" fill=\"#FFFFFF\"></path>\n      </g>\n    </svg>\n  </div>\n  <div class=\"dz-error-mark\">\n    <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">\n      <title>Error</title>\n      <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <g stroke=\"#747474\" stroke-opacity=\"0.198794158\" fill=\"#FFFFFF\" fill-opacity=\"0.816519475\">\n          <path d=\"M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>",
                    // END OPTIONS
                    // (Required by the dropzone documentation parser)

                    /*
         Those functions register themselves to the events on init and handle all
         the user interface specific stuff. Overwriting them won't break the upload
         but can break the way it's displayed.
         You can overwrite them if you don't like the default behavior. If you just
         want to add an additional event handler, register it on the dropzone object
         and don't overwrite those options.
         */
                    // Those are self explanatory and simply concern the DragnDrop.
                    drop: function drop(e) {
                        return this.element.classList.remove("dz-drag-hover");
                    },
                    dragstart: function dragstart(e) {},
                    dragend: function dragend(e) {
                        return this.element.classList.remove("dz-drag-hover");
                    },
                    dragenter: function dragenter(e) {
                        return this.element.classList.add("dz-drag-hover");
                    },
                    dragover: function dragover(e) {
                        return this.element.classList.add("dz-drag-hover");
                    },
                    dragleave: function dragleave(e) {
                        return this.element.classList.remove("dz-drag-hover");
                    },
                    paste: function paste(e) {},
                    // Called whenever there are no files left in the dropzone anymore, and the
                    // dropzone should be displayed as if in the initial state.
                    reset: function reset() {
                        return this.element.classList.remove("dz-started");
                    },
                    // Called when a file is added to the queue
                    // Receives `file`
                    addedfile: function addedfile(file) {
                        var _this2 = this;

                        if (this.element === this.previewsContainer) {
                            this.element.classList.add("dz-started");
                        }

                        if (this.previewsContainer) {
                            file.previewElement = Dropzone.createElement(this.options.previewTemplate.trim());
                            file.previewTemplate = file.previewElement; // Backwards compatibility

                            this.previewsContainer.appendChild(file.previewElement);

                            var _iterator3 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-name]")),
                                _step3;

                            try {
                                for (_iterator3.s(); !(_step3 = _iterator3.n()).done;) {
                                    var node = _step3.value;
                                    node.textContent = file.name;
                                }
                            } catch (err) {
                                _iterator3.e(err);
                            } finally {
                                _iterator3.f();
                            }

                            var _iterator4 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-size]")),
                                _step4;

                            try {
                                for (_iterator4.s(); !(_step4 = _iterator4.n()).done;) {
                                    node = _step4.value;
                                    node.innerHTML = this.filesize(file.size);
                                }
                            } catch (err) {
                                _iterator4.e(err);
                            } finally {
                                _iterator4.f();
                            }

                            if (this.options.addRemoveLinks) {
                                file._removeLink = Dropzone.createElement("<a class=\"dz-remove\" href=\"javascript:undefined;\" data-dz-remove>".concat(this.options.dictRemoveFile, "</a>"));
                                file.previewElement.appendChild(file._removeLink);
                            }

                            var removeFileEvent = function removeFileEvent(e) {
                                e.preventDefault();
                                e.stopPropagation();

                                if (file.status === Dropzone.UPLOADING) {
                                    return Dropzone.confirm(_this2.options.dictCancelUploadConfirmation, function() {
                                        return _this2.removeFile(file);
                                    });
                                } else {
                                    if (_this2.options.dictRemoveFileConfirmation) {
                                        return Dropzone.confirm(_this2.options.dictRemoveFileConfirmation, function() {
                                            return _this2.removeFile(file);
                                        });
                                    } else {
                                        return _this2.removeFile(file);
                                    }
                                }
                            };

                            var _iterator5 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-remove]")),
                                _step5;

                            try {
                                for (_iterator5.s(); !(_step5 = _iterator5.n()).done;) {
                                    var removeLink = _step5.value;
                                    removeLink.addEventListener("click", removeFileEvent);
                                }
                            } catch (err) {
                                _iterator5.e(err);
                            } finally {
                                _iterator5.f();
                            }
                        }
                    },
                    // Called whenever a file is removed.
                    removedfile: function removedfile(file) {
                        if (file.previewElement != null && file.previewElement.parentNode != null) {
                            file.previewElement.parentNode.removeChild(file.previewElement);
                        }

                        return this._updateMaxFilesReachedClass();
                    },
                    // Called when a thumbnail has been generated
                    // Receives `file` and `dataUrl`
                    thumbnail: function thumbnail(file, dataUrl) {
                        if (file.previewElement) {
                            file.previewElement.classList.remove("dz-file-preview");

                            var _iterator6 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-thumbnail]")),
                                _step6;

                            try {
                                for (_iterator6.s(); !(_step6 = _iterator6.n()).done;) {
                                    var thumbnailElement = _step6.value;
                                    thumbnailElement.alt = file.name;
                                    thumbnailElement.src = dataUrl;
                                }
                            } catch (err) {
                                _iterator6.e(err);
                            } finally {
                                _iterator6.f();
                            }

                            return setTimeout(function() {
                                return file.previewElement.classList.add("dz-image-preview");
                            }, 1);
                        }
                    },
                    // Called whenever an error occurs
                    // Receives `file` and `message`
                    error: function error(file, message) {
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-error");

                            if (typeof message !== "string" && message.error) {
                                message = message.error;
                            }

                            var _iterator7 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-errormessage]")),
                                _step7;

                            try {
                                for (_iterator7.s(); !(_step7 = _iterator7.n()).done;) {
                                    var node = _step7.value;
                                    node.textContent = message;
                                }
                            } catch (err) {
                                _iterator7.e(err);
                            } finally {
                                _iterator7.f();
                            }
                        }
                    },
                    errormultiple: function errormultiple() {},
                    // Called when a file gets processed. Since there is a cue, not all added
                    // files are processed immediately.
                    // Receives `file`
                    processing: function processing(file) {
                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-processing");

                            if (file._removeLink) {
                                return file._removeLink.innerHTML = this.options.dictCancelUpload;
                            }
                        }
                    },
                    processingmultiple: function processingmultiple() {},
                    // Called whenever the upload progress gets updated.
                    // Receives `file`, `progress` (percentage 0-100) and `bytesSent`.
                    // To get the total number of bytes of the file, use `file.size`
                    uploadprogress: function uploadprogress(file, progress, bytesSent) {
                        if (file.previewElement) {
                            var _iterator8 = _createForOfIteratorHelper(file.previewElement.querySelectorAll("[data-dz-uploadprogress]")),
                                _step8;

                            try {
                                for (_iterator8.s(); !(_step8 = _iterator8.n()).done;) {
                                    var node = _step8.value;
                                    node.nodeName === 'PROGRESS' ? node.value = progress : node.style.width = "".concat(progress, "%");
                                }
                            } catch (err) {
                                _iterator8.e(err);
                            } finally {
                                _iterator8.f();
                            }
                        }
                    },
                    // Called whenever the total upload progress gets updated.
                    // Called with totalUploadProgress (0-100), totalBytes and totalBytesSent
                    totaluploadprogress: function totaluploadprogress() {},
                    // Called just before the file is sent. Gets the `xhr` object as second
                    // parameter, so you can modify it (for example to add a CSRF token) and a
                    // `formData` object to add additional information.
                    sending: function sending() {},
                    sendingmultiple: function sendingmultiple() {},
                    // When the complete upload is finished and successful
                    // Receives `file`
                    success: function success(file) {
                        if (file.previewElement) {
                            return file.previewElement.classList.add("dz-success");
                        }
                    },
                    successmultiple: function successmultiple() {},
                    // When the upload is canceled.
                    canceled: function canceled(file) {
                        return this.emit("error", file, this.options.dictUploadCanceled);
                    },
                    canceledmultiple: function canceledmultiple() {},
                    // When the upload is finished, either with success or an error.
                    // Receives `file`
                    complete: function complete(file) {
                        if (file._removeLink) {
                            file._removeLink.innerHTML = this.options.dictRemoveFile;
                        }

                        if (file.previewElement) {
                            return file.previewElement.classList.add("dz-complete");
                        }
                    },
                    completemultiple: function completemultiple() {},
                    maxfilesexceeded: function maxfilesexceeded() {},
                    maxfilesreached: function maxfilesreached() {},
                    queuecomplete: function queuecomplete() {},
                    addedfiles: function addedfiles() {}
                };
                this.prototype._thumbnailQueue = [];
                this.prototype._processingThumbnail = false;
            } // global utility

        }, {
            key: "extend",
            value: function extend(target) {
                for (var _len2 = arguments.length, objects = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
                    objects[_key2 - 1] = arguments[_key2];
                }

                for (var _i = 0, _objects = objects; _i < _objects.length; _i++) {
                    var object = _objects[_i];

                    for (var key in object) {
                        var val = object[key];
                        target[key] = val;
                    }
                }

                return target;
            }
        }]);

        function Dropzone(el, options) {
            var _this;

            _classCallCheck(this, Dropzone);

            _this = _super.call(this);
            var fallback, left;
            _this.element = el; // For backwards compatibility since the version was in the prototype previously

            _this.version = Dropzone.version;
            _this.defaultOptions.previewTemplate = _this.defaultOptions.previewTemplate.replace(/\n*/g, "");
            _this.clickableElements = [];
            _this.listeners = [];
            _this.files = []; // All files

            if (typeof _this.element === "string") {
                _this.element = document.querySelector(_this.element);
            } // Not checking if instance of HTMLElement or Element since IE9 is extremely weird.


            if (!_this.element || _this.element.nodeType == null) {
                throw new Error("Invalid dropzone element.");
            }

            if (_this.element.dropzone) {
                throw new Error("Dropzone already attached.");
            } // Now add this dropzone to the instances.


            Dropzone.instances.push(_assertThisInitialized(_this)); // Put the dropzone inside the element itself.

            _this.element.dropzone = _assertThisInitialized(_this);
            var elementOptions = (left = Dropzone.optionsForElement(_this.element)) != null ? left : {};
            _this.options = Dropzone.extend({}, _this.defaultOptions, elementOptions, options != null ? options : {}); // If the browser failed, just call the fallback and leave

            if (_this.options.forceFallback || !Dropzone.isBrowserSupported()) {
                return _possibleConstructorReturn(_this, _this.options.fallback.call(_assertThisInitialized(_this)));
            } // @options.url = @element.getAttribute "action" unless @options.url?


            if (_this.options.url == null) {
                _this.options.url = _this.element.getAttribute("action");
            }

            if (!_this.options.url) {
                throw new Error("No URL provided.");
            }

            if (_this.options.acceptedFiles && _this.options.acceptedMimeTypes) {
                throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");
            }

            if (_this.options.uploadMultiple && _this.options.chunking) {
                throw new Error('You cannot set both: uploadMultiple and chunking.');
            } // Backwards compatibility


            if (_this.options.acceptedMimeTypes) {
                _this.options.acceptedFiles = _this.options.acceptedMimeTypes;
                delete _this.options.acceptedMimeTypes;
            } // Backwards compatibility


            if (_this.options.renameFilename != null) {
                _this.options.renameFile = function(file) {
                    return _this.options.renameFilename.call(_assertThisInitialized(_this), file.name, file);
                };
            }

            if (typeof _this.options.method === 'string') {
                _this.options.method = _this.options.method.toUpperCase();
            }

            if ((fallback = _this.getExistingFallback()) && fallback.parentNode) {
                // Remove the fallback
                fallback.parentNode.removeChild(fallback);
            } // Display previews in the previewsContainer element or the Dropzone element unless explicitly set to false


            if (_this.options.previewsContainer !== false) {
                if (_this.options.previewsContainer) {
                    _this.previewsContainer = Dropzone.getElement(_this.options.previewsContainer, "previewsContainer");
                } else {
                    _this.previewsContainer = _this.element;
                }
            }

            if (_this.options.clickable) {
                if (_this.options.clickable === true) {
                    _this.clickableElements = [_this.element];
                } else {
                    _this.clickableElements = Dropzone.getElements(_this.options.clickable, "clickable");
                }
            }

            _this.init();

            return _this;
        } // Returns all files that have been accepted


        _createClass(Dropzone, [{
            key: "getAcceptedFiles",
            value: function getAcceptedFiles() {
                return this.files.filter(function(file) {
                    return file.accepted;
                }).map(function(file) {
                    return file;
                });
            } // Returns all files that have been rejected
            // Not sure when that's going to be useful, but added for completeness.

        }, {
            key: "getRejectedFiles",
            value: function getRejectedFiles() {
                return this.files.filter(function(file) {
                    return !file.accepted;
                }).map(function(file) {
                    return file;
                });
            }
        }, {
            key: "getFilesWithStatus",
            value: function getFilesWithStatus(status) {
                return this.files.filter(function(file) {
                    return file.status === status;
                }).map(function(file) {
                    return file;
                });
            } // Returns all files that are in the queue

        }, {
            key: "getQueuedFiles",
            value: function getQueuedFiles() {
                return this.getFilesWithStatus(Dropzone.QUEUED);
            }
        }, {
            key: "getUploadingFiles",
            value: function getUploadingFiles() {
                return this.getFilesWithStatus(Dropzone.UPLOADING);
            }
        }, {
            key: "getAddedFiles",
            value: function getAddedFiles() {
                return this.getFilesWithStatus(Dropzone.ADDED);
            } // Files that are either queued or uploading

        }, {
            key: "getActiveFiles",
            value: function getActiveFiles() {
                return this.files.filter(function(file) {
                    return file.status === Dropzone.UPLOADING || file.status === Dropzone.QUEUED;
                }).map(function(file) {
                    return file;
                });
            } // The function that gets called when Dropzone is initialized. You
            // can (and should) setup event listeners inside this function.

        }, {
            key: "init",
            value: function init() {
                var _this3 = this;

                // In case it isn't set already
                if (this.element.tagName === "form") {
                    this.element.setAttribute("enctype", "multipart/form-data");
                }

                if (this.element.classList.contains("dropzone") && !this.element.querySelector(".dz-message")) {
                    this.element.appendChild(Dropzone.createElement("<div class=\"dz-default dz-message\"><button class=\"dz-button\" type=\"button\">".concat(this.options.dictDefaultMessage, "</button></div>")));
                }

                if (this.clickableElements.length) {
                    var setupHiddenFileInput = function setupHiddenFileInput() {
                        if (_this3.hiddenFileInput) {
                            _this3.hiddenFileInput.parentNode.removeChild(_this3.hiddenFileInput);
                        }

                        _this3.hiddenFileInput = document.createElement("input");

                        _this3.hiddenFileInput.setAttribute("type", "file");

                        if (_this3.options.maxFiles === null || _this3.options.maxFiles > 1) {
                            _this3.hiddenFileInput.setAttribute("multiple", "multiple");
                        }

                        _this3.hiddenFileInput.className = "dz-hidden-input";

                        if (_this3.options.acceptedFiles !== null) {
                            _this3.hiddenFileInput.setAttribute("accept", _this3.options.acceptedFiles);
                        }

                        if (_this3.options.capture !== null) {
                            _this3.hiddenFileInput.setAttribute("capture", _this3.options.capture);
                        } // Not setting `display="none"` because some browsers don't accept clicks
                        // on elements that aren't displayed.


                        _this3.hiddenFileInput.style.visibility = "hidden";
                        _this3.hiddenFileInput.style.position = "absolute";
                        _this3.hiddenFileInput.style.top = "0";
                        _this3.hiddenFileInput.style.left = "0";
                        _this3.hiddenFileInput.style.height = "0";
                        _this3.hiddenFileInput.style.width = "0";
                        Dropzone.getElement(_this3.options.hiddenInputContainer, 'hiddenInputContainer').appendChild(_this3.hiddenFileInput);
                        return _this3.hiddenFileInput.addEventListener("change", function() {
                            var files = _this3.hiddenFileInput.files;

                            if (files.length) {
                                var _iterator9 = _createForOfIteratorHelper(files),
                                    _step9;

                                try {
                                    for (_iterator9.s(); !(_step9 = _iterator9.n()).done;) {
                                        var file = _step9.value;

                                        _this3.addFile(file);
                                    }
                                } catch (err) {
                                    _iterator9.e(err);
                                } finally {
                                    _iterator9.f();
                                }
                            }

                            _this3.emit("addedfiles", files);

                            return setupHiddenFileInput();
                        });
                    };

                    setupHiddenFileInput();
                }

                this.URL = window.URL !== null ? window.URL : window.webkitURL; // Setup all event listeners on the Dropzone object itself.
                // They're not in @setupEventListeners() because they shouldn't be removed
                // again when the dropzone gets disabled.

                var _iterator10 = _createForOfIteratorHelper(this.events),
                    _step10;

                try {
                    for (_iterator10.s(); !(_step10 = _iterator10.n()).done;) {
                        var eventName = _step10.value;
                        this.on(eventName, this.options[eventName]);
                    }
                } catch (err) {
                    _iterator10.e(err);
                } finally {
                    _iterator10.f();
                }

                this.on("uploadprogress", function() {
                    return _this3.updateTotalUploadProgress();
                });
                this.on("removedfile", function() {
                    return _this3.updateTotalUploadProgress();
                });
                this.on("canceled", function(file) {
                    return _this3.emit("complete", file);
                }); // Emit a `queuecomplete` event if all files finished uploading.

                this.on("complete", function(file) {
                    if (_this3.getAddedFiles().length === 0 && _this3.getUploadingFiles().length === 0 && _this3.getQueuedFiles().length === 0) {
                        // This needs to be deferred so that `queuecomplete` really triggers after `complete`
                        return setTimeout(function() {
                            return _this3.emit("queuecomplete");
                        }, 0);
                    }
                });

                var containsFiles = function containsFiles(e) {
                    if (e.dataTransfer.types) {
                        // Because e.dataTransfer.types is an Object in
                        // IE, we need to iterate like this instead of
                        // using e.dataTransfer.types.some()
                        for (var i = 0; i < e.dataTransfer.types.length; i++) {
                            if (e.dataTransfer.types[i] === "Files") return true;
                        }
                    }

                    return false;
                };

                var noPropagation = function noPropagation(e) {
                    // If there are no files, we don't want to stop
                    // propagation so we don't interfere with other
                    // drag and drop behaviour.
                    if (!containsFiles(e)) return;
                    e.stopPropagation();

                    if (e.preventDefault) {
                        return e.preventDefault();
                    } else {
                        return e.returnValue = false;
                    }
                }; // Create the listeners


                this.listeners = [{
                    element: this.element,
                    events: {
                        "dragstart": function dragstart(e) {
                            return _this3.emit("dragstart", e);
                        },
                        "dragenter": function dragenter(e) {
                            noPropagation(e);
                            return _this3.emit("dragenter", e);
                        },
                        "dragover": function dragover(e) {
                            // Makes it possible to drag files from chrome's download bar
                            // http://stackoverflow.com/questions/19526430/drag-and-drop-file-uploads-from-chrome-downloads-bar
                            // Try is required to prevent bug in Internet Explorer 11 (SCRIPT65535 exception)
                            var efct;

                            try {
                                efct = e.dataTransfer.effectAllowed;
                            } catch (error) {}

                            e.dataTransfer.dropEffect = 'move' === efct || 'linkMove' === efct ? 'move' : 'copy';
                            noPropagation(e);
                            return _this3.emit("dragover", e);
                        },
                        "dragleave": function dragleave(e) {
                            return _this3.emit("dragleave", e);
                        },
                        "drop": function drop(e) {
                            noPropagation(e);
                            return _this3.drop(e);
                        },
                        "dragend": function dragend(e) {
                            return _this3.emit("dragend", e);
                        }
                    } // This is disabled right now, because the browsers don't implement it properly.
                    // "paste": (e) =>
                    //   noPropagation e
                    //   @paste e

                }];
                this.clickableElements.forEach(function(clickableElement) {
                    return _this3.listeners.push({
                        element: clickableElement,
                        events: {
                            "click": function click(evt) {
                                // Only the actual dropzone or the message element should trigger file selection
                                if (clickableElement !== _this3.element || evt.target === _this3.element || Dropzone.elementInside(evt.target, _this3.element.querySelector(".dz-message"))) {
                                    _this3.hiddenFileInput.click(); // Forward the click

                                }

                                return true;
                            }
                        }
                    });
                });
                this.enable();
                return this.options.init.call(this);
            } // Not fully tested yet

        }, {
            key: "destroy",
            value: function destroy() {
                this.disable();
                this.removeAllFiles(true);

                if (this.hiddenFileInput != null ? this.hiddenFileInput.parentNode : undefined) {
                    this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput);
                    this.hiddenFileInput = null;
                }

                delete this.element.dropzone;
                return Dropzone.instances.splice(Dropzone.instances.indexOf(this), 1);
            }
        }, {
            key: "updateTotalUploadProgress",
            value: function updateTotalUploadProgress() {
                var totalUploadProgress;
                var totalBytesSent = 0;
                var totalBytes = 0;
                var activeFiles = this.getActiveFiles();

                if (activeFiles.length) {
                    var _iterator11 = _createForOfIteratorHelper(this.getActiveFiles()),
                        _step11;

                    try {
                        for (_iterator11.s(); !(_step11 = _iterator11.n()).done;) {
                            var file = _step11.value;
                            totalBytesSent += file.upload.bytesSent;
                            totalBytes += file.upload.total;
                        }
                    } catch (err) {
                        _iterator11.e(err);
                    } finally {
                        _iterator11.f();
                    }

                    totalUploadProgress = 100 * totalBytesSent / totalBytes;
                } else {
                    totalUploadProgress = 100;
                }

                return this.emit("totaluploadprogress", totalUploadProgress, totalBytes, totalBytesSent);
            } // @options.paramName can be a function taking one parameter rather than a string.
            // A parameter name for a file is obtained simply by calling this with an index number.

        }, {
            key: "_getParamName",
            value: function _getParamName(n) {
                if (typeof this.options.paramName === "function") {
                    return this.options.paramName(n);
                } else {
                    return "".concat(this.options.paramName).concat(this.options.uploadMultiple ? "[".concat(n, "]") : "");
                }
            } // If @options.renameFile is a function,
            // the function will be used to rename the file.name before appending it to the formData

        }, {
            key: "_renameFile",
            value: function _renameFile(file) {
                if (typeof this.options.renameFile !== "function") {
                    return file.name;
                }

                return this.options.renameFile(file);
            } // Returns a form that can be used as fallback if the browser does not support DragnDrop
            //
            // If the dropzone is already a form, only the input field and button are returned. Otherwise a complete form element is provided.
            // This code has to pass in IE7 :(

        }, {
            key: "getFallbackForm",
            value: function getFallbackForm() {
                var existingFallback, form;

                if (existingFallback = this.getExistingFallback()) {
                    return existingFallback;
                }

                var fieldsString = "<div class=\"dz-fallback\">";

                if (this.options.dictFallbackText) {
                    fieldsString += "<p>".concat(this.options.dictFallbackText, "</p>");
                }

                fieldsString += "<input type=\"file\" name=\"".concat(this._getParamName(0), "\" ").concat(this.options.uploadMultiple ? 'multiple="multiple"' : undefined, " /><input type=\"submit\" value=\"Upload!\"></div>");
                var fields = Dropzone.createElement(fieldsString);

                if (this.element.tagName !== "FORM") {
                    form = Dropzone.createElement("<form action=\"".concat(this.options.url, "\" enctype=\"multipart/form-data\" method=\"").concat(this.options.method, "\"></form>"));
                    form.appendChild(fields);
                } else {
                    // Make sure that the enctype and method attributes are set properly
                    this.element.setAttribute("enctype", "multipart/form-data");
                    this.element.setAttribute("method", this.options.method);
                }

                return form != null ? form : fields;
            } // Returns the fallback elements if they exist already
            //
            // This code has to pass in IE7 :(

        }, {
            key: "getExistingFallback",
            value: function getExistingFallback() {
                var getFallback = function getFallback(elements) {
                    var _iterator12 = _createForOfIteratorHelper(elements),
                        _step12;

                    try {
                        for (_iterator12.s(); !(_step12 = _iterator12.n()).done;) {
                            var el = _step12.value;

                            if (/(^| )fallback($| )/.test(el.className)) {
                                return el;
                            }
                        }
                    } catch (err) {
                        _iterator12.e(err);
                    } finally {
                        _iterator12.f();
                    }
                };

                for (var _i2 = 0, _arr = ["div", "form"]; _i2 < _arr.length; _i2++) {
                    var tagName = _arr[_i2];
                    var fallback;

                    if (fallback = getFallback(this.element.getElementsByTagName(tagName))) {
                        return fallback;
                    }
                }
            } // Activates all listeners stored in @listeners

        }, {
            key: "setupEventListeners",
            value: function setupEventListeners() {
                return this.listeners.map(function(elementListeners) {
                    return function() {
                        var result = [];

                        for (var event in elementListeners.events) {
                            var listener = elementListeners.events[event];
                            result.push(elementListeners.element.addEventListener(event, listener, false));
                        }

                        return result;
                    }();
                });
            } // Deactivates all listeners stored in @listeners

        }, {
            key: "removeEventListeners",
            value: function removeEventListeners() {
                return this.listeners.map(function(elementListeners) {
                    return function() {
                        var result = [];

                        for (var event in elementListeners.events) {
                            var listener = elementListeners.events[event];
                            result.push(elementListeners.element.removeEventListener(event, listener, false));
                        }

                        return result;
                    }();
                });
            } // Removes all event listeners and cancels all files in the queue or being processed.

        }, {
            key: "disable",
            value: function disable() {
                var _this4 = this;

                this.clickableElements.forEach(function(element) {
                    return element.classList.remove("dz-clickable");
                });
                this.removeEventListeners();
                this.disabled = true;
                return this.files.map(function(file) {
                    return _this4.cancelUpload(file);
                });
            }
        }, {
            key: "enable",
            value: function enable() {
                delete this.disabled;
                this.clickableElements.forEach(function(element) {
                    return element.classList.add("dz-clickable");
                });
                return this.setupEventListeners();
            } // Returns a nicely formatted filesize

        }, {
            key: "filesize",
            value: function filesize(size) {
                var selectedSize = 0;
                var selectedUnit = "b";

                if (size > 0) {
                    var units = ['tb', 'gb', 'mb', 'kb', 'b'];

                    for (var i = 0; i < units.length; i++) {
                        var unit = units[i];
                        var cutoff = Math.pow(this.options.filesizeBase, 4 - i) / 10;

                        if (size >= cutoff) {
                            selectedSize = size / Math.pow(this.options.filesizeBase, 4 - i);
                            selectedUnit = unit;
                            break;
                        }
                    }

                    selectedSize = Math.round(10 * selectedSize) / 10; // Cutting of digits
                }

                return "<strong>".concat(selectedSize, "</strong> ").concat(this.options.dictFileSizeUnits[selectedUnit]);
            } // Adds or removes the `dz-max-files-reached` class from the form.

        }, {
            key: "_updateMaxFilesReachedClass",
            value: function _updateMaxFilesReachedClass() {
                if (this.options.maxFiles != null && this.getAcceptedFiles().length >= this.options.maxFiles) {
                    if (this.getAcceptedFiles().length === this.options.maxFiles) {
                        this.emit('maxfilesreached', this.files);
                    }

                    return this.element.classList.add("dz-max-files-reached");
                } else {
                    return this.element.classList.remove("dz-max-files-reached");
                }
            }
        }, {
            key: "drop",
            value: function drop(e) {
                if (!e.dataTransfer) {
                    return;
                }

                this.emit("drop", e); // Convert the FileList to an Array
                // This is necessary for IE11

                var files = [];

                for (var i = 0; i < e.dataTransfer.files.length; i++) {
                    files[i] = e.dataTransfer.files[i];
                } // Even if it's a folder, files.length will contain the folders.


                if (files.length) {
                    var items = e.dataTransfer.items;

                    if (items && items.length && items[0].webkitGetAsEntry != null) {
                        // The browser supports dropping of folders, so handle items instead of files
                        this._addFilesFromItems(items);
                    } else {
                        this.handleFiles(files);
                    }
                }

                this.emit("addedfiles", files);
            }
        }, {
            key: "paste",
            value: function paste(e) {
                if (__guard__(e != null ? e.clipboardData : undefined, function(x) {
                    return x.items;
                }) == null) {
                    return;
                }

                this.emit("paste", e);
                var items = e.clipboardData.items;

                if (items.length) {
                    return this._addFilesFromItems(items);
                }
            }
        }, {
            key: "handleFiles",
            value: function handleFiles(files) {
                var _iterator13 = _createForOfIteratorHelper(files),
                    _step13;

                try {
                    for (_iterator13.s(); !(_step13 = _iterator13.n()).done;) {
                        var file = _step13.value;
                        this.addFile(file);
                    }
                } catch (err) {
                    _iterator13.e(err);
                } finally {
                    _iterator13.f();
                }
            } // When a folder is dropped (or files are pasted), items must be handled
            // instead of files.

        }, {
            key: "_addFilesFromItems",
            value: function _addFilesFromItems(items) {
                var _this5 = this;

                return function() {
                    var result = [];

                    var _iterator14 = _createForOfIteratorHelper(items),
                        _step14;

                    try {
                        for (_iterator14.s(); !(_step14 = _iterator14.n()).done;) {
                            var item = _step14.value;
                            var entry;

                            if (item.webkitGetAsEntry != null && (entry = item.webkitGetAsEntry())) {
                                if (entry.isFile) {
                                    result.push(_this5.addFile(item.getAsFile()));
                                } else if (entry.isDirectory) {
                                    // Append all files from that directory to files
                                    result.push(_this5._addFilesFromDirectory(entry, entry.name));
                                } else {
                                    result.push(undefined);
                                }
                            } else if (item.getAsFile != null) {
                                if (item.kind == null || item.kind === "file") {
                                    result.push(_this5.addFile(item.getAsFile()));
                                } else {
                                    result.push(undefined);
                                }
                            } else {
                                result.push(undefined);
                            }
                        }
                    } catch (err) {
                        _iterator14.e(err);
                    } finally {
                        _iterator14.f();
                    }

                    return result;
                }();
            } // Goes through the directory, and adds each file it finds recursively

        }, {
            key: "_addFilesFromDirectory",
            value: function _addFilesFromDirectory(directory, path) {
                var _this6 = this;

                var dirReader = directory.createReader();

                var errorHandler = function errorHandler(error) {
                    return __guardMethod__(console, 'log', function(o) {
                        return o.log(error);
                    });
                };

                var readEntries = function readEntries() {
                    return dirReader.readEntries(function(entries) {
                        if (entries.length > 0) {
                            var _iterator15 = _createForOfIteratorHelper(entries),
                                _step15;

                            try {
                                for (_iterator15.s(); !(_step15 = _iterator15.n()).done;) {
                                    var entry = _step15.value;

                                    if (entry.isFile) {
                                        entry.file(function(file) {
                                            if (_this6.options.ignoreHiddenFiles && file.name.substring(0, 1) === '.') {
                                                return;
                                            }

                                            file.fullPath = "".concat(path, "/").concat(file.name);
                                            return _this6.addFile(file);
                                        });
                                    } else if (entry.isDirectory) {
                                        _this6._addFilesFromDirectory(entry, "".concat(path, "/").concat(entry.name));
                                    }
                                } // Recursively call readEntries() again, since browser only handle
                                // the first 100 entries.
                                // See: https://developer.mozilla.org/en-US/docs/Web/API/DirectoryReader#readEntries

                            } catch (err) {
                                _iterator15.e(err);
                            } finally {
                                _iterator15.f();
                            }

                            readEntries();
                        }

                        return null;
                    }, errorHandler);
                };

                return readEntries();
            } // If `done()` is called without argument the file is accepted
            // If you call it with an error message, the file is rejected
            // (This allows for asynchronous validation)
            //
            // This function checks the filesize, and if the file.type passes the
            // `acceptedFiles` check.

        }, {
            key: "accept",
            value: function accept(file, done) {
                if (this.options.maxFilesize && file.size > this.options.maxFilesize * 1024 * 1024) {
                    done(this.options.dictFileTooBig.replace("{{filesize}}", Math.round(file.size / 1024 / 10.24) / 100).replace("{{maxFilesize}}", this.options.maxFilesize));
                } else if (!Dropzone.isValidFile(file, this.options.acceptedFiles)) {
                    done(this.options.dictInvalidFileType);
                } else if (this.options.maxFiles != null && this.getAcceptedFiles().length >= this.options.maxFiles) {
                    done(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}", this.options.maxFiles));
                    this.emit("maxfilesexceeded", file);
                } else {
                    this.options.accept.call(this, file, done);
                }
            }
        }, {
            key: "addFile",
            value: function addFile(file) {
                var _this7 = this;

                file.upload = {
                    uuid: Dropzone.uuidv4(),
                    progress: 0,
                    // Setting the total upload size to file.size for the beginning
                    // It's actual different than the size to be transmitted.
                    total: file.size,
                    bytesSent: 0,
                    filename: this._renameFile(file) // Not setting chunking information here, because the acutal data — and
                    // thus the chunks — might change if `options.transformFile` is set
                    // and does something to the data.

                };
                this.files.push(file);
                file.status = Dropzone.ADDED;
                this.emit("addedfile", file);

                this._enqueueThumbnail(file);

                this.accept(file, function(error) {
                    if (error) {
                        file.accepted = false;

                        _this7._errorProcessing([file], error); // Will set the file.status

                    } else {
                        file.accepted = true;

                        if (_this7.options.autoQueue) {
                            _this7.enqueueFile(file);
                        } // Will set .accepted = true

                    }

                    _this7._updateMaxFilesReachedClass();
                });
            } // Wrapper for enqueueFile

        }, {
            key: "enqueueFiles",
            value: function enqueueFiles(files) {
                var _iterator16 = _createForOfIteratorHelper(files),
                    _step16;

                try {
                    for (_iterator16.s(); !(_step16 = _iterator16.n()).done;) {
                        var file = _step16.value;
                        this.enqueueFile(file);
                    }
                } catch (err) {
                    _iterator16.e(err);
                } finally {
                    _iterator16.f();
                }

                return null;
            }
        }, {
            key: "enqueueFile",
            value: function enqueueFile(file) {
                var _this8 = this;

                if (file.status === Dropzone.ADDED && file.accepted === true) {
                    file.status = Dropzone.QUEUED;

                    if (this.options.autoProcessQueue) {
                        return setTimeout(function() {
                            return _this8.processQueue();
                        }, 0); // Deferring the call
                    }
                } else {
                    throw new Error("This file can't be queued because it has already been processed or was rejected.");
                }
            }
        }, {
            key: "_enqueueThumbnail",
            value: function _enqueueThumbnail(file) {
                var _this9 = this;

                if (this.options.createImageThumbnails && file.type.match(/image.*/) && file.size <= this.options.maxThumbnailFilesize * 1024 * 1024) {
                    this._thumbnailQueue.push(file);

                    return setTimeout(function() {
                        return _this9._processThumbnailQueue();
                    }, 0); // Deferring the call
                }
            }
        }, {
            key: "_processThumbnailQueue",
            value: function _processThumbnailQueue() {
                var _this10 = this;

                if (this._processingThumbnail || this._thumbnailQueue.length === 0) {
                    return;
                }

                this._processingThumbnail = true;

                var file = this._thumbnailQueue.shift();

                return this.createThumbnail(file, this.options.thumbnailWidth, this.options.thumbnailHeight, this.options.thumbnailMethod, true, function(dataUrl) {
                    _this10.emit("thumbnail", file, dataUrl);

                    _this10._processingThumbnail = false;
                    return _this10._processThumbnailQueue();
                });
            } // Can be called by the user to remove a file

        }, {
            key: "removeFile",
            value: function removeFile(file) {
                if (file.status === Dropzone.UPLOADING) {
                    this.cancelUpload(file);
                }

                this.files = without(this.files, file);
                this.emit("removedfile", file);

                if (this.files.length === 0) {
                    return this.emit("reset");
                }
            } // Removes all files that aren't currently processed from the list

        }, {
            key: "removeAllFiles",
            value: function removeAllFiles(cancelIfNecessary) {
                // Create a copy of files since removeFile() changes the @files array.
                if (cancelIfNecessary == null) {
                    cancelIfNecessary = false;
                }

                var _iterator17 = _createForOfIteratorHelper(this.files.slice()),
                    _step17;

                try {
                    for (_iterator17.s(); !(_step17 = _iterator17.n()).done;) {
                        var file = _step17.value;

                        if (file.status !== Dropzone.UPLOADING || cancelIfNecessary) {
                            this.removeFile(file);
                        }
                    }
                } catch (err) {
                    _iterator17.e(err);
                } finally {
                    _iterator17.f();
                }

                return null;
            } // Resizes an image before it gets sent to the server. This function is the default behavior of
            // `options.transformFile` if `resizeWidth` or `resizeHeight` are set. The callback is invoked with
            // the resized blob.

        }, {
            key: "resizeImage",
            value: function resizeImage(file, width, height, resizeMethod, callback) {
                var _this11 = this;

                return this.createThumbnail(file, width, height, resizeMethod, true, function(dataUrl, canvas) {
                    if (canvas == null) {
                        // The image has not been resized
                        return callback(file);
                    } else {
                        var resizeMimeType = _this11.options.resizeMimeType;

                        if (resizeMimeType == null) {
                            resizeMimeType = file.type;
                        }

                        var resizedDataURL = canvas.toDataURL(resizeMimeType, _this11.options.resizeQuality);

                        if (resizeMimeType === 'image/jpeg' || resizeMimeType === 'image/jpg') {
                            // Now add the original EXIF information
                            resizedDataURL = ExifRestore.restore(file.dataURL, resizedDataURL);
                        }

                        return callback(Dropzone.dataURItoBlob(resizedDataURL));
                    }
                });
            }
        }, {
            key: "createThumbnail",
            value: function createThumbnail(file, width, height, resizeMethod, fixOrientation, callback) {
                var _this12 = this;

                var fileReader = new FileReader();

                fileReader.onload = function() {
                    file.dataURL = fileReader.result; // Don't bother creating a thumbnail for SVG images since they're vector

                    if (file.type === "image/svg+xml") {
                        if (callback != null) {
                            callback(fileReader.result);
                        }

                        return;
                    }

                    _this12.createThumbnailFromUrl(file, width, height, resizeMethod, fixOrientation, callback);
                };

                fileReader.readAsDataURL(file);
            } // `mockFile` needs to have these attributes:
            // 
            //     { name: 'name', size: 12345, imageUrl: '' }
            //
            // `callback` will be invoked when the image has been downloaded and displayed.
            // `crossOrigin` will be added to the `img` tag when accessing the file.

        }, {
            key: "displayExistingFile",
            value: function displayExistingFile(mockFile, imageUrl, callback, crossOrigin) {
                var _this13 = this;

                var resizeThumbnail = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : true;
                this.emit("addedfile", mockFile);
                this.emit("complete", mockFile);

                if (!resizeThumbnail) {
                    this.emit("thumbnail", mockFile, imageUrl);
                    if (callback) callback();
                } else {
                    var onDone = function onDone(thumbnail) {
                        _this13.emit('thumbnail', mockFile, thumbnail);

                        if (callback) callback();
                    };

                    mockFile.dataURL = imageUrl;
                    this.createThumbnailFromUrl(mockFile, this.options.thumbnailWidth, this.options.thumbnailHeight, this.options.resizeMethod, this.options.fixOrientation, onDone, crossOrigin);
                }
            }
        }, {
            key: "createThumbnailFromUrl",
            value: function createThumbnailFromUrl(file, width, height, resizeMethod, fixOrientation, callback, crossOrigin) {
                var _this14 = this;

                // Not using `new Image` here because of a bug in latest Chrome versions.
                // See https://github.com/enyo/dropzone/pull/226
                var img = document.createElement("img");

                if (crossOrigin) {
                    img.crossOrigin = crossOrigin;
                } // fixOrientation is not needed anymore with browsers handling imageOrientation


                fixOrientation = getComputedStyle(document.body)['imageOrientation'] == 'from-image' ? false : fixOrientation;

                img.onload = function() {
                    var loadExif = function loadExif(callback) {
                        return callback(1);
                    };

                    if (typeof EXIF !== 'undefined' && EXIF !== null && fixOrientation) {
                        loadExif = function loadExif(callback) {
                            return EXIF.getData(img, function() {
                                return callback(EXIF.getTag(this, 'Orientation'));
                            });
                        };
                    }

                    return loadExif(function(orientation) {
                        file.width = img.width;
                        file.height = img.height;

                        var resizeInfo = _this14.options.resize.call(_this14, file, width, height, resizeMethod);

                        var canvas = document.createElement("canvas");
                        var ctx = canvas.getContext("2d");
                        canvas.width = resizeInfo.trgWidth;
                        canvas.height = resizeInfo.trgHeight;

                        if (orientation > 4) {
                            canvas.width = resizeInfo.trgHeight;
                            canvas.height = resizeInfo.trgWidth;
                        }

                        switch (orientation) {
                            case 2:
                                // horizontal flip
                                ctx.translate(canvas.width, 0);
                                ctx.scale(-1, 1);
                                break;

                            case 3:
                                // 180° rotate left
                                ctx.translate(canvas.width, canvas.height);
                                ctx.rotate(Math.PI);
                                break;

                            case 4:
                                // vertical flip
                                ctx.translate(0, canvas.height);
                                ctx.scale(1, -1);
                                break;

                            case 5:
                                // vertical flip + 90 rotate right
                                ctx.rotate(0.5 * Math.PI);
                                ctx.scale(1, -1);
                                break;

                            case 6:
                                // 90° rotate right
                                ctx.rotate(0.5 * Math.PI);
                                ctx.translate(0, -canvas.width);
                                break;

                            case 7:
                                // horizontal flip + 90 rotate right
                                ctx.rotate(0.5 * Math.PI);
                                ctx.translate(canvas.height, -canvas.width);
                                ctx.scale(-1, 1);
                                break;

                            case 8:
                                // 90° rotate left
                                ctx.rotate(-0.5 * Math.PI);
                                ctx.translate(-canvas.height, 0);
                                break;
                        } // This is a bugfix for iOS' scaling bug.


                        drawImageIOSFix(ctx, img, resizeInfo.srcX != null ? resizeInfo.srcX : 0, resizeInfo.srcY != null ? resizeInfo.srcY : 0, resizeInfo.srcWidth, resizeInfo.srcHeight, resizeInfo.trgX != null ? resizeInfo.trgX : 0, resizeInfo.trgY != null ? resizeInfo.trgY : 0, resizeInfo.trgWidth, resizeInfo.trgHeight);
                        var thumbnail = canvas.toDataURL("image/png");

                        if (callback != null) {
                            return callback(thumbnail, canvas);
                        }
                    });
                };

                if (callback != null) {
                    img.onerror = callback;
                }

                return img.src = file.dataURL;
            } // Goes through the queue and processes files if there aren't too many already.

        }, {
            key: "processQueue",
            value: function processQueue() {
                var parallelUploads = this.options.parallelUploads;
                var processingLength = this.getUploadingFiles().length;
                var i = processingLength; // There are already at least as many files uploading than should be

                if (processingLength >= parallelUploads) {
                    return;
                }

                var queuedFiles = this.getQueuedFiles();

                if (!(queuedFiles.length > 0)) {
                    return;
                }

                if (this.options.uploadMultiple) {
                    // The files should be uploaded in one request
                    return this.processFiles(queuedFiles.slice(0, parallelUploads - processingLength));
                } else {
                    while (i < parallelUploads) {
                        if (!queuedFiles.length) {
                            return;
                        } // Nothing left to process


                        this.processFile(queuedFiles.shift());
                        i++;
                    }
                }
            } // Wrapper for `processFiles`

        }, {
            key: "processFile",
            value: function processFile(file) {
                return this.processFiles([file]);
            } // Loads the file, then calls finishedLoading()

        }, {
            key: "processFiles",
            value: function processFiles(files) {
                var _iterator18 = _createForOfIteratorHelper(files),
                    _step18;

                try {
                    for (_iterator18.s(); !(_step18 = _iterator18.n()).done;) {
                        var file = _step18.value;
                        file.processing = true; // Backwards compatibility

                        file.status = Dropzone.UPLOADING;
                        this.emit("processing", file);
                    }
                } catch (err) {
                    _iterator18.e(err);
                } finally {
                    _iterator18.f();
                }

                if (this.options.uploadMultiple) {
                    this.emit("processingmultiple", files);
                }

                return this.uploadFiles(files);
            }
        }, {
            key: "_getFilesWithXhr",
            value: function _getFilesWithXhr(xhr) {
                var files;
                return files = this.files.filter(function(file) {
                    return file.xhr === xhr;
                }).map(function(file) {
                    return file;
                });
            } // Cancels the file upload and sets the status to CANCELED
            // **if** the file is actually being uploaded.
            // If it's still in the queue, the file is being removed from it and the status
            // set to CANCELED.

        }, {
            key: "cancelUpload",
            value: function cancelUpload(file) {
                if (file.status === Dropzone.UPLOADING) {
                    var groupedFiles = this._getFilesWithXhr(file.xhr);

                    var _iterator19 = _createForOfIteratorHelper(groupedFiles),
                        _step19;

                    try {
                        for (_iterator19.s(); !(_step19 = _iterator19.n()).done;) {
                            var groupedFile = _step19.value;
                            groupedFile.status = Dropzone.CANCELED;
                        }
                    } catch (err) {
                        _iterator19.e(err);
                    } finally {
                        _iterator19.f();
                    }

                    if (typeof file.xhr !== 'undefined') {
                        file.xhr.abort();
                    }

                    var _iterator20 = _createForOfIteratorHelper(groupedFiles),
                        _step20;

                    try {
                        for (_iterator20.s(); !(_step20 = _iterator20.n()).done;) {
                            var _groupedFile = _step20.value;
                            this.emit("canceled", _groupedFile);
                        }
                    } catch (err) {
                        _iterator20.e(err);
                    } finally {
                        _iterator20.f();
                    }

                    if (this.options.uploadMultiple) {
                        this.emit("canceledmultiple", groupedFiles);
                    }
                } else if (file.status === Dropzone.ADDED || file.status === Dropzone.QUEUED) {
                    file.status = Dropzone.CANCELED;
                    this.emit("canceled", file);

                    if (this.options.uploadMultiple) {
                        this.emit("canceledmultiple", [file]);
                    }
                }

                if (this.options.autoProcessQueue) {
                    return this.processQueue();
                }
            }
        }, {
            key: "resolveOption",
            value: function resolveOption(option) {
                if (typeof option === 'function') {
                    for (var _len3 = arguments.length, args = new Array(_len3 > 1 ? _len3 - 1 : 0), _key3 = 1; _key3 < _len3; _key3++) {
                        args[_key3 - 1] = arguments[_key3];
                    }

                    return option.apply(this, args);
                }

                return option;
            }
        }, {
            key: "uploadFile",
            value: function uploadFile(file) {
                return this.uploadFiles([file]);
            }
        }, {
            key: "uploadFiles",
            value: function uploadFiles(files) {
                var _this15 = this;

                this._transformFiles(files, function(transformedFiles) {
                    if (_this15.options.chunking) {
                        // Chunking is not allowed to be used with `uploadMultiple` so we know
                        // that there is only __one__file.
                        var transformedFile = transformedFiles[0];
                        files[0].upload.chunked = _this15.options.chunking && (_this15.options.forceChunking || transformedFile.size > _this15.options.chunkSize);
                        files[0].upload.totalChunkCount = Math.ceil(transformedFile.size / _this15.options.chunkSize);
                    }

                    if (files[0].upload.chunked) {
                        // This file should be sent in chunks!
                        // If the chunking option is set, we **know** that there can only be **one** file, since
                        // uploadMultiple is not allowed with this option.
                        var file = files[0];
                        var _transformedFile = transformedFiles[0];
                        var startedChunkCount = 0;
                        file.upload.chunks = [];

                        var handleNextChunk = function handleNextChunk() {
                            var chunkIndex = 0; // Find the next item in file.upload.chunks that is not defined yet.

                            while (file.upload.chunks[chunkIndex] !== undefined) {
                                chunkIndex++;
                            } // This means, that all chunks have already been started.


                            if (chunkIndex >= file.upload.totalChunkCount) return;
                            startedChunkCount++;
                            var start = chunkIndex * _this15.options.chunkSize;
                            var end = Math.min(start + _this15.options.chunkSize, _transformedFile.size);
                            var dataBlock = {
                                name: _this15._getParamName(0),
                                data: _transformedFile.webkitSlice ? _transformedFile.webkitSlice(start, end) : _transformedFile.slice(start, end),
                                filename: file.upload.filename,
                                chunkIndex: chunkIndex
                            };
                            file.upload.chunks[chunkIndex] = {
                                file: file,
                                index: chunkIndex,
                                dataBlock: dataBlock,
                                // In case we want to retry.
                                status: Dropzone.UPLOADING,
                                progress: 0,
                                retries: 0 // The number of times this block has been retried.

                            };

                            _this15._uploadData(files, [dataBlock]);
                        };

                        file.upload.finishedChunkUpload = function(chunk) {
                            var allFinished = true;
                            chunk.status = Dropzone.SUCCESS; // Clear the data from the chunk

                            chunk.dataBlock = null; // Leaving this reference to xhr intact here will cause memory leaks in some browsers

                            chunk.xhr = null;

                            for (var i = 0; i < file.upload.totalChunkCount; i++) {
                                if (file.upload.chunks[i] === undefined) {
                                    return handleNextChunk();
                                }

                                if (file.upload.chunks[i].status !== Dropzone.SUCCESS) {
                                    allFinished = false;
                                }
                            }

                            if (allFinished) {
                                _this15.options.chunksUploaded(file, function() {
                                    _this15._finished(files, '', null);
                                });
                            }
                        };

                        if (_this15.options.parallelChunkUploads) {
                            for (var i = 0; i < file.upload.totalChunkCount; i++) {
                                handleNextChunk();
                            }
                        } else {
                            handleNextChunk();
                        }
                    } else {
                        var dataBlocks = [];

                        for (var _i3 = 0; _i3 < files.length; _i3++) {
                            dataBlocks[_i3] = {
                                name: _this15._getParamName(_i3),
                                data: transformedFiles[_i3],
                                filename: files[_i3].upload.filename
                            };
                        }

                        _this15._uploadData(files, dataBlocks);
                    }
                });
            } /// Returns the right chunk for given file and xhr

        }, {
            key: "_getChunk",
            value: function _getChunk(file, xhr) {
                for (var i = 0; i < file.upload.totalChunkCount; i++) {
                    if (file.upload.chunks[i] !== undefined && file.upload.chunks[i].xhr === xhr) {
                        return file.upload.chunks[i];
                    }
                }
            } // This function actually uploads the file(s) to the server.
            // If dataBlocks contains the actual data to upload (meaning, that this could either be transformed
            // files, or individual chunks for chunked upload).

        }, {
            key: "_uploadData",
            value: function _uploadData(files, dataBlocks) {
                var _this16 = this;

                var xhr = new XMLHttpRequest(); // Put the xhr object in the file objects to be able to reference it later.

                var _iterator21 = _createForOfIteratorHelper(files),
                    _step21;

                try {
                    for (_iterator21.s(); !(_step21 = _iterator21.n()).done;) {
                        var file = _step21.value;
                        file.xhr = xhr;
                    }
                } catch (err) {
                    _iterator21.e(err);
                } finally {
                    _iterator21.f();
                }

                if (files[0].upload.chunked) {
                    // Put the xhr object in the right chunk object, so it can be associated later, and found with _getChunk
                    files[0].upload.chunks[dataBlocks[0].chunkIndex].xhr = xhr;
                }

                var method = this.resolveOption(this.options.method, files);
                var url = this.resolveOption(this.options.url, files);
                xhr.open(method, url, true); // Setting the timeout after open because of IE11 issue: https://gitlab.com/meno/dropzone/issues/8

                xhr.timeout = this.resolveOption(this.options.timeout, files); // Has to be after `.open()`. See https://github.com/enyo/dropzone/issues/179

                xhr.withCredentials = !! this.options.withCredentials;

                xhr.onload = function(e) {
                    _this16._finishedUploading(files, xhr, e);
                };

                xhr.ontimeout = function() {
                    _this16._handleUploadError(files, xhr, "Request timedout after ".concat(_this16.options.timeout / 1000, " seconds"));
                };

                xhr.onerror = function() {
                    _this16._handleUploadError(files, xhr);
                }; // Some browsers do not have the .upload property


                var progressObj = xhr.upload != null ? xhr.upload : xhr;

                progressObj.onprogress = function(e) {
                    return _this16._updateFilesUploadProgress(files, xhr, e);
                };

                var headers = {
                    "Accept": "application/json",
                    "Cache-Control": "no-cache",
                    "X-Requested-With": "XMLHttpRequest"
                };

                if (this.options.headers) {
                    Dropzone.extend(headers, this.options.headers);
                }

                for (var headerName in headers) {
                    var headerValue = headers[headerName];

                    if (headerValue) {
                        xhr.setRequestHeader(headerName, headerValue);
                    }
                }

                var formData = new FormData(); // Adding all @options parameters

                if (this.options.params) {
                    var additionalParams = this.options.params;

                    if (typeof additionalParams === 'function') {
                        additionalParams = additionalParams.call(this, files, xhr, files[0].upload.chunked ? this._getChunk(files[0], xhr) : null);
                    }

                    for (var key in additionalParams) {
                        var value = additionalParams[key];

                        if (Array.isArray(value)) {
                            // The additional parameter contains an array,
                            // so lets iterate over it to attach each value
                            // individually.
                            for (var i = 0; i < value.length; i++) {
                                formData.append(key, value[i]);
                            }
                        } else {
                            formData.append(key, value);
                        }
                    }
                } // Let the user add additional data if necessary


                var _iterator22 = _createForOfIteratorHelper(files),
                    _step22;

                try {
                    for (_iterator22.s(); !(_step22 = _iterator22.n()).done;) {
                        var _file = _step22.value;
                        this.emit("sending", _file, xhr, formData);
                    }
                } catch (err) {
                    _iterator22.e(err);
                } finally {
                    _iterator22.f();
                }

                if (this.options.uploadMultiple) {
                    this.emit("sendingmultiple", files, xhr, formData);
                }

                this._addFormElementData(formData); // Finally add the files
                // Has to be last because some servers (eg: S3) expect the file to be the last parameter


                for (var _i4 = 0; _i4 < dataBlocks.length; _i4++) {
                    var dataBlock = dataBlocks[_i4];
                    formData.append(dataBlock.name, dataBlock.data, dataBlock.filename);
                }

                this.submitRequest(xhr, formData, files);
            } // Transforms all files with this.options.transformFile and invokes done with the transformed files when done.

        }, {
            key: "_transformFiles",
            value: function _transformFiles(files, done) {
                var _this17 = this;

                var transformedFiles = []; // Clumsy way of handling asynchronous calls, until I get to add a proper Future library.

                var doneCounter = 0;

                var _loop = function _loop(i) {
                    _this17.options.transformFile.call(_this17, files[i], function(transformedFile) {
                        transformedFiles[i] = transformedFile;

                        if (++doneCounter === files.length) {
                            done(transformedFiles);
                        }
                    });
                };

                for (var i = 0; i < files.length; i++) {
                    _loop(i);
                }
            } // Takes care of adding other input elements of the form to the AJAX request

        }, {
            key: "_addFormElementData",
            value: function _addFormElementData(formData) {
                // Take care of other input elements
                if (this.element.tagName === "FORM") {
                    var _iterator23 = _createForOfIteratorHelper(this.element.querySelectorAll("input, textarea, select, button")),
                        _step23;

                    try {
                        for (_iterator23.s(); !(_step23 = _iterator23.n()).done;) {
                            var input = _step23.value;
                            var inputName = input.getAttribute("name");
                            var inputType = input.getAttribute("type");
                            if (inputType) inputType = inputType.toLowerCase(); // If the input doesn't have a name, we can't use it.

                            if (typeof inputName === 'undefined' || inputName === null) continue;

                            if (input.tagName === "SELECT" && input.hasAttribute("multiple")) {
                                // Possibly multiple values
                                var _iterator24 = _createForOfIteratorHelper(input.options),
                                    _step24;

                                try {
                                    for (_iterator24.s(); !(_step24 = _iterator24.n()).done;) {
                                        var option = _step24.value;

                                        if (option.selected) {
                                            formData.append(inputName, option.value);
                                        }
                                    }
                                } catch (err) {
                                    _iterator24.e(err);
                                } finally {
                                    _iterator24.f();
                                }
                            } else if (!inputType || inputType !== "checkbox" && inputType !== "radio" || input.checked) {
                                formData.append(inputName, input.value);
                            }
                        }
                    } catch (err) {
                        _iterator23.e(err);
                    } finally {
                        _iterator23.f();
                    }
                }
            } // Invoked when there is new progress information about given files.
            // If e is not provided, it is assumed that the upload is finished.

        }, {
            key: "_updateFilesUploadProgress",
            value: function _updateFilesUploadProgress(files, xhr, e) {
                var progress;

                if (typeof e !== 'undefined') {
                    progress = 100 * e.loaded / e.total;

                    if (files[0].upload.chunked) {
                        var file = files[0]; // Since this is a chunked upload, we need to update the appropriate chunk progress.

                        var chunk = this._getChunk(file, xhr);

                        chunk.progress = progress;
                        chunk.total = e.total;
                        chunk.bytesSent = e.loaded;
                        var fileProgress = 0,
                            fileTotal,
                            fileBytesSent;
                        file.upload.progress = 0;
                        file.upload.total = 0;
                        file.upload.bytesSent = 0;

                        for (var i = 0; i < file.upload.totalChunkCount; i++) {
                            if (file.upload.chunks[i] !== undefined && file.upload.chunks[i].progress !== undefined) {
                                file.upload.progress += file.upload.chunks[i].progress;
                                file.upload.total += file.upload.chunks[i].total;
                                file.upload.bytesSent += file.upload.chunks[i].bytesSent;
                            }
                        }

                        file.upload.progress = file.upload.progress / file.upload.totalChunkCount;
                    } else {
                        var _iterator25 = _createForOfIteratorHelper(files),
                            _step25;

                        try {
                            for (_iterator25.s(); !(_step25 = _iterator25.n()).done;) {
                                var _file2 = _step25.value;
                                _file2.upload.progress = progress;
                                _file2.upload.total = e.total;
                                _file2.upload.bytesSent = e.loaded;
                            }
                        } catch (err) {
                            _iterator25.e(err);
                        } finally {
                            _iterator25.f();
                        }
                    }

                    var _iterator26 = _createForOfIteratorHelper(files),
                        _step26;

                    try {
                        for (_iterator26.s(); !(_step26 = _iterator26.n()).done;) {
                            var _file3 = _step26.value;
                            this.emit("uploadprogress", _file3, _file3.upload.progress, _file3.upload.bytesSent);
                        }
                    } catch (err) {
                        _iterator26.e(err);
                    } finally {
                        _iterator26.f();
                    }
                } else {
                    // Called when the file finished uploading
                    var allFilesFinished = true;
                    progress = 100;

                    var _iterator27 = _createForOfIteratorHelper(files),
                        _step27;

                    try {
                        for (_iterator27.s(); !(_step27 = _iterator27.n()).done;) {
                            var _file4 = _step27.value;

                            if (_file4.upload.progress !== 100 || _file4.upload.bytesSent !== _file4.upload.total) {
                                allFilesFinished = false;
                            }

                            _file4.upload.progress = progress;
                            _file4.upload.bytesSent = _file4.upload.total;
                        } // Nothing to do, all files already at 100%

                    } catch (err) {
                        _iterator27.e(err);
                    } finally {
                        _iterator27.f();
                    }

                    if (allFilesFinished) {
                        return;
                    }

                    var _iterator28 = _createForOfIteratorHelper(files),
                        _step28;

                    try {
                        for (_iterator28.s(); !(_step28 = _iterator28.n()).done;) {
                            var _file5 = _step28.value;
                            this.emit("uploadprogress", _file5, progress, _file5.upload.bytesSent);
                        }
                    } catch (err) {
                        _iterator28.e(err);
                    } finally {
                        _iterator28.f();
                    }
                }
            }
        }, {
            key: "_finishedUploading",
            value: function _finishedUploading(files, xhr, e) {
                var response;

                if (files[0].status === Dropzone.CANCELED) {
                    return;
                }

                if (xhr.readyState !== 4) {
                    return;
                }

                if (xhr.responseType !== 'arraybuffer' && xhr.responseType !== 'blob') {
                    response = xhr.responseText;

                    if (xhr.getResponseHeader("content-type") && ~xhr.getResponseHeader("content-type").indexOf("application/json")) {
                        try {
                            response = JSON.parse(response);
                        } catch (error) {
                            e = error;
                            response = "Invalid JSON response from server.";
                        }
                    }
                }

                this._updateFilesUploadProgress(files);

                if (!(200 <= xhr.status && xhr.status < 300)) {
                    this._handleUploadError(files, xhr, response);
                } else {
                    if (files[0].upload.chunked) {
                        files[0].upload.finishedChunkUpload(this._getChunk(files[0], xhr));
                    } else {
                        this._finished(files, response, e);
                    }
                }
            }
        }, {
            key: "_handleUploadError",
            value: function _handleUploadError(files, xhr, response) {
                if (files[0].status === Dropzone.CANCELED) {
                    return;
                }

                if (files[0].upload.chunked && this.options.retryChunks) {
                    var chunk = this._getChunk(files[0], xhr);

                    if (chunk.retries++ < this.options.retryChunksLimit) {
                        this._uploadData(files, [chunk.dataBlock]);

                        return;
                    } else {
                        console.warn('Retried this chunk too often. Giving up.');
                    }
                }

                this._errorProcessing(files, response || this.options.dictResponseError.replace("{{statusCode}}", xhr.status), xhr);
            }
        }, {
            key: "submitRequest",
            value: function submitRequest(xhr, formData, files) {
                xhr.send(formData);
            } // Called internally when processing is finished.
            // Individual callbacks have to be called in the appropriate sections.

        }, {
            key: "_finished",
            value: function _finished(files, responseText, e) {
                var _iterator29 = _createForOfIteratorHelper(files),
                    _step29;

                try {
                    for (_iterator29.s(); !(_step29 = _iterator29.n()).done;) {
                        var file = _step29.value;
                        file.status = Dropzone.SUCCESS;
                        this.emit("success", file, responseText, e);
                        this.emit("complete", file);
                    }
                } catch (err) {
                    _iterator29.e(err);
                } finally {
                    _iterator29.f();
                }

                if (this.options.uploadMultiple) {
                    this.emit("successmultiple", files, responseText, e);
                    this.emit("completemultiple", files);
                }

                if (this.options.autoProcessQueue) {
                    return this.processQueue();
                }
            } // Called internally when processing is finished.
            // Individual callbacks have to be called in the appropriate sections.

        }, {
            key: "_errorProcessing",
            value: function _errorProcessing(files, message, xhr) {
                var _iterator30 = _createForOfIteratorHelper(files),
                    _step30;

                try {
                    for (_iterator30.s(); !(_step30 = _iterator30.n()).done;) {
                        var file = _step30.value;
                        file.status = Dropzone.ERROR;
                        this.emit("error", file, message, xhr);
                        this.emit("complete", file);
                    }
                } catch (err) {
                    _iterator30.e(err);
                } finally {
                    _iterator30.f();
                }

                if (this.options.uploadMultiple) {
                    this.emit("errormultiple", files, message, xhr);
                    this.emit("completemultiple", files);
                }

                if (this.options.autoProcessQueue) {
                    return this.processQueue();
                }
            }
        }], [{
            key: "uuidv4",
            value: function uuidv4() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = Math.random() * 16 | 0,
                        v = c === 'x' ? r : r & 0x3 | 0x8;
                    return v.toString(16);
                });
            }
        }]);

        return Dropzone;
    }(Emitter);

    Dropzone.initClass();
    Dropzone.version = "5.7.2"; // This is a map of options for your different dropzones. Add configurations
    // to this object for your different dropzone elemens.
    //
    // Example:
    //
    //     Dropzone.options.myDropzoneElementId = { maxFilesize: 1 };
    //
    // To disable autoDiscover for a specific element, you can set `false` as an option:
    //
    //     Dropzone.options.myDisabledElementId = false;
    //
    // And in html:
    //
    //     <form action="/upload" id="my-dropzone-element-id" class="dropzone"></form>

    Dropzone.options = {}; // Returns the options for an element or undefined if none available.

    Dropzone.optionsForElement = function(element) {
        // Get the `Dropzone.options.elementId` for this element if it exists
        if (element.getAttribute("id")) {
            return Dropzone.options[camelize(element.getAttribute("id"))];
        } else {
            return undefined;
        }
    }; // Holds a list of all dropzone instances


    Dropzone.instances = []; // Returns the dropzone for given element if any

    Dropzone.forElement = function(element) {
        if (typeof element === "string") {
            element = document.querySelector(element);
        }

        if ((element != null ? element.dropzone : undefined) == null) {
            throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");
        }

        return element.dropzone;
    }; // Set to false if you don't want Dropzone to automatically find and attach to .dropzone elements.


    Dropzone.autoDiscover = true; // Looks for all .dropzone elements and creates a dropzone for them

    Dropzone.discover = function() {
        var dropzones;

        if (document.querySelectorAll) {
            dropzones = document.querySelectorAll(".dropzone");
        } else {
            dropzones = []; // IE :(

            var checkElements = function checkElements(elements) {
                return function() {
                    var result = [];

                    var _iterator31 = _createForOfIteratorHelper(elements),
                        _step31;

                    try {
                        for (_iterator31.s(); !(_step31 = _iterator31.n()).done;) {
                            var el = _step31.value;

                            if (/(^| )dropzone($| )/.test(el.className)) {
                                result.push(dropzones.push(el));
                            } else {
                                result.push(undefined);
                            }
                        }
                    } catch (err) {
                        _iterator31.e(err);
                    } finally {
                        _iterator31.f();
                    }

                    return result;
                }();
            };

            checkElements(document.getElementsByTagName("div"));
            checkElements(document.getElementsByTagName("form"));
        }

        return function() {
            var result = [];

            var _iterator32 = _createForOfIteratorHelper(dropzones),
                _step32;

            try {
                for (_iterator32.s(); !(_step32 = _iterator32.n()).done;) {
                    var dropzone = _step32.value;

                    // Create a dropzone unless auto discover has been disabled for specific element
                    if (Dropzone.optionsForElement(dropzone) !== false) {
                        result.push(new Dropzone(dropzone));
                    } else {
                        result.push(undefined);
                    }
                }
            } catch (err) {
                _iterator32.e(err);
            } finally {
                _iterator32.f();
            }

            return result;
        }();
    }; // Since the whole Drag'n'Drop API is pretty new, some browsers implement it,
    // but not correctly.
    // So I created a blacklist of userAgents. Yes, yes. Browser sniffing, I know.
    // But what to do when browsers *theoretically* support an API, but crash
    // when using it.
    //
    // This is a list of regular expressions tested against navigator.userAgent
    //
    // ** It should only be used on browser that *do* support the API, but
    // incorrectly **
    //


    Dropzone.blacklistedBrowsers = [ // The mac os and windows phone version of opera 12 seems to have a problem with the File drag'n'drop API.
        /opera.*(Macintosh|Windows Phone).*version\/12/i
    ]; // Checks if the browser is supported

    Dropzone.isBrowserSupported = function() {
        var capableBrowser = true;

        if (window.File && window.FileReader && window.FileList && window.Blob && window.FormData && document.querySelector) {
            if (!("classList" in document.createElement("a"))) {
                capableBrowser = false;
            } else {
                // The browser supports the API, but may be blacklisted.
                var _iterator33 = _createForOfIteratorHelper(Dropzone.blacklistedBrowsers),
                    _step33;

                try {
                    for (_iterator33.s(); !(_step33 = _iterator33.n()).done;) {
                        var regex = _step33.value;

                        if (regex.test(navigator.userAgent)) {
                            capableBrowser = false;
                            continue;
                        }
                    }
                } catch (err) {
                    _iterator33.e(err);
                } finally {
                    _iterator33.f();
                }
            }
        } else {
            capableBrowser = false;
        }

        return capableBrowser;
    };

    Dropzone.dataURItoBlob = function(dataURI) {
        // convert base64 to raw binary data held in a string
        // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
        var byteString = atob(dataURI.split(',')[1]); // separate out the mime component

        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]; // write the bytes of the string to an ArrayBuffer

        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);

        for (var i = 0, end = byteString.length, asc = 0 <= end; asc ? i <= end : i >= end; asc ? i++ : i--) {
            ia[i] = byteString.charCodeAt(i);
        } // write the ArrayBuffer to a blob


        return new Blob([ab], {
            type: mimeString
        });
    }; // Returns an array without the rejected item


    var without = function without(list, rejectedItem) {
        return list.filter(function(item) {
            return item !== rejectedItem;
        }).map(function(item) {
            return item;
        });
    }; // abc-def_ghi -> abcDefGhi


    var camelize = function camelize(str) {
        return str.replace(/[\-_](\w)/g, function(match) {
            return match.charAt(1).toUpperCase();
        });
    }; // Creates an element from string


    Dropzone.createElement = function(string) {
        var div = document.createElement("div");
        div.innerHTML = string;
        return div.childNodes[0];
    }; // Tests if given element is inside (or simply is) the container


    Dropzone.elementInside = function(element, container) {
        if (element === container) {
            return true;
        } // Coffeescript doesn't support do/while loops


        while (element = element.parentNode) {
            if (element === container) {
                return true;
            }
        }

        return false;
    };

    Dropzone.getElement = function(el, name) {
        var element;

        if (typeof el === "string") {
            element = document.querySelector(el);
        } else if (el.nodeType != null) {
            element = el;
        }

        if (element == null) {
            throw new Error("Invalid `".concat(name, "` option provided. Please provide a CSS selector or a plain HTML element."));
        }

        return element;
    };

    Dropzone.getElements = function(els, name) {
        var el, elements;

        if (els instanceof Array) {
            elements = [];

            try {
                var _iterator34 = _createForOfIteratorHelper(els),
                    _step34;

                try {
                    for (_iterator34.s(); !(_step34 = _iterator34.n()).done;) {
                        el = _step34.value;
                        elements.push(this.getElement(el, name));
                    }
                } catch (err) {
                    _iterator34.e(err);
                } finally {
                    _iterator34.f();
                }
            } catch (e) {
                elements = null;
            }
        } else if (typeof els === "string") {
            elements = [];

            var _iterator35 = _createForOfIteratorHelper(document.querySelectorAll(els)),
                _step35;

            try {
                for (_iterator35.s(); !(_step35 = _iterator35.n()).done;) {
                    el = _step35.value;
                    elements.push(el);
                }
            } catch (err) {
                _iterator35.e(err);
            } finally {
                _iterator35.f();
            }
        } else if (els.nodeType != null) {
            elements = [els];
        }

        if (elements == null || !elements.length) {
            throw new Error("Invalid `".concat(name, "` option provided. Please provide a CSS selector, a plain HTML element or a list of those."));
        }

        return elements;
    }; // Asks the user the question and calls accepted or rejected accordingly
    //
    // The default implementation just uses `window.confirm` and then calls the
    // appropriate callback.


    Dropzone.confirm = function(question, accepted, rejected) {
        if (window.confirm(question)) {
            return accepted();
        } else if (rejected != null) {
            return rejected();
        }
    }; // Validates the mime type like this:
    //
    // https://developer.mozilla.org/en-US/docs/HTML/Element/input#attr-accept


    Dropzone.isValidFile = function(file, acceptedFiles) {
        if (!acceptedFiles) {
            return true;
        } // If there are no accepted mime types, it's OK


        acceptedFiles = acceptedFiles.split(",");
        var mimeType = file.type;
        var baseMimeType = mimeType.replace(/\/.*$/, "");

        var _iterator36 = _createForOfIteratorHelper(acceptedFiles),
            _step36;

        try {
            for (_iterator36.s(); !(_step36 = _iterator36.n()).done;) {
                var validType = _step36.value;
                validType = validType.trim();

                if (validType.charAt(0) === ".") {
                    if (file.name.toLowerCase().indexOf(validType.toLowerCase(), file.name.length - validType.length) !== -1) {
                        return true;
                    }
                } else if (/\/\*$/.test(validType)) {
                    // This is something like a image/* mime type
                    if (baseMimeType === validType.replace(/\/.*$/, "")) {
                        return true;
                    }
                } else {
                    if (mimeType === validType) {
                        return true;
                    }
                }
            }
        } catch (err) {
            _iterator36.e(err);
        } finally {
            _iterator36.f();
        }

        return false;
    }; // Augment jQuery


    if (typeof jQuery !== 'undefined' && jQuery !== null) {
        jQuery.fn.dropzone = function(options) {
            return this.each(function() {
                return new Dropzone(this, options);
            });
        };
    }

    if (true && module !== null) {
        module.exports = Dropzone;
    } else {
        window.Dropzone = Dropzone;
    } // Dropzone file status codes


    Dropzone.ADDED = "added";
    Dropzone.QUEUED = "queued"; // For backwards compatibility. Now, if a file is accepted, it's either queued
    // or uploading.

    Dropzone.ACCEPTED = Dropzone.QUEUED;
    Dropzone.UPLOADING = "uploading";
    Dropzone.PROCESSING = Dropzone.UPLOADING; // alias

    Dropzone.CANCELED = "canceled";
    Dropzone.ERROR = "error";
    Dropzone.SUCCESS = "success";
    /*

 Bugfix for iOS 6 and 7
 Source: http://stackoverflow.com/questions/11929099/html5-canvas-drawimage-ratio-bug-ios
 based on the work of https://github.com/stomita/ios-imagefile-megapixel

 */
    // Detecting vertical squash in loaded image.
    // Fixes a bug which squash image vertically while drawing into canvas for some images.
    // This is a bug in iOS6 devices. This function from https://github.com/stomita/ios-imagefile-megapixel

    var detectVerticalSquash = function detectVerticalSquash(img) {
        var iw = img.naturalWidth;
        var ih = img.naturalHeight;
        var canvas = document.createElement("canvas");
        canvas.width = 1;
        canvas.height = ih;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var _ctx$getImageData = ctx.getImageData(1, 0, 1, ih),
            data = _ctx$getImageData.data; // search image edge pixel position in case it is squashed vertically.


        var sy = 0;
        var ey = ih;
        var py = ih;

        while (py > sy) {
            var alpha = data[(py - 1) * 4 + 3];

            if (alpha === 0) {
                ey = py;
            } else {
                sy = py;
            }

            py = ey + sy >> 1;
        }

        var ratio = py / ih;

        if (ratio === 0) {
            return 1;
        } else {
            return ratio;
        }
    }; // A replacement for context.drawImage
    // (args are for source and destination).


    var drawImageIOSFix = function drawImageIOSFix(ctx, img, sx, sy, sw, sh, dx, dy, dw, dh) {
        var vertSquashRatio = detectVerticalSquash(img);
        return ctx.drawImage(img, sx, sy, sw, sh, dx, dy, dw, dh / vertSquashRatio);
    }; // Based on MinifyJpeg
    // Source: http://www.perry.cz/files/ExifRestorer.js
    // http://elicon.blog57.fc2.com/blog-entry-206.html


    var ExifRestore = /*#__PURE__*/ function() {
        function ExifRestore() {
            _classCallCheck(this, ExifRestore);
        }

        _createClass(ExifRestore, null, [{
            key: "initClass",
            value: function initClass() {
                this.KEY_STR = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
            }
        }, {
            key: "encode64",
            value: function encode64(input) {
                var output = '';
                var chr1 = undefined;
                var chr2 = undefined;
                var chr3 = '';
                var enc1 = undefined;
                var enc2 = undefined;
                var enc3 = undefined;
                var enc4 = '';
                var i = 0;

                while (true) {
                    chr1 = input[i++];
                    chr2 = input[i++];
                    chr3 = input[i++];
                    enc1 = chr1 >> 2;
                    enc2 = (chr1 & 3) << 4 | chr2 >> 4;
                    enc3 = (chr2 & 15) << 2 | chr3 >> 6;
                    enc4 = chr3 & 63;

                    if (isNaN(chr2)) {
                        enc3 = enc4 = 64;
                    } else if (isNaN(chr3)) {
                        enc4 = 64;
                    }

                    output = output + this.KEY_STR.charAt(enc1) + this.KEY_STR.charAt(enc2) + this.KEY_STR.charAt(enc3) + this.KEY_STR.charAt(enc4);
                    chr1 = chr2 = chr3 = '';
                    enc1 = enc2 = enc3 = enc4 = '';

                    if (!(i < input.length)) {
                        break;
                    }
                }

                return output;
            }
        }, {
            key: "restore",
            value: function restore(origFileBase64, resizedFileBase64) {
                if (!origFileBase64.match('data:image/jpeg;base64,')) {
                    return resizedFileBase64;
                }

                var rawImage = this.decode64(origFileBase64.replace('data:image/jpeg;base64,', ''));
                var segments = this.slice2Segments(rawImage);
                var image = this.exifManipulation(resizedFileBase64, segments);
                return "data:image/jpeg;base64,".concat(this.encode64(image));
            }
        }, {
            key: "exifManipulation",
            value: function exifManipulation(resizedFileBase64, segments) {
                var exifArray = this.getExifArray(segments);
                var newImageArray = this.insertExif(resizedFileBase64, exifArray);
                var aBuffer = new Uint8Array(newImageArray);
                return aBuffer;
            }
        }, {
            key: "getExifArray",
            value: function getExifArray(segments) {
                var seg = undefined;
                var x = 0;

                while (x < segments.length) {
                    seg = segments[x];

                    if (seg[0] === 255 & seg[1] === 225) {
                        return seg;
                    }

                    x++;
                }

                return [];
            }
        }, {
            key: "insertExif",
            value: function insertExif(resizedFileBase64, exifArray) {
                var imageData = resizedFileBase64.replace('data:image/jpeg;base64,', '');
                var buf = this.decode64(imageData);
                var separatePoint = buf.indexOf(255, 3);
                var mae = buf.slice(0, separatePoint);
                var ato = buf.slice(separatePoint);
                var array = mae;
                array = array.concat(exifArray);
                array = array.concat(ato);
                return array;
            }
        }, {
            key: "slice2Segments",
            value: function slice2Segments(rawImageArray) {
                var head = 0;
                var segments = [];

                while (true) {
                    var length;

                    if (rawImageArray[head] === 255 & rawImageArray[head + 1] === 218) {
                        break;
                    }

                    if (rawImageArray[head] === 255 & rawImageArray[head + 1] === 216) {
                        head += 2;
                    } else {
                        length = rawImageArray[head + 2] * 256 + rawImageArray[head + 3];
                        var endPoint = head + length + 2;
                        var seg = rawImageArray.slice(head, endPoint);
                        segments.push(seg);
                        head = endPoint;
                    }

                    if (head > rawImageArray.length) {
                        break;
                    }
                }

                return segments;
            }
        }, {
            key: "decode64",
            value: function decode64(input) {
                var output = '';
                var chr1 = undefined;
                var chr2 = undefined;
                var chr3 = '';
                var enc1 = undefined;
                var enc2 = undefined;
                var enc3 = undefined;
                var enc4 = '';
                var i = 0;
                var buf = []; // remove all characters that are not A-Z, a-z, 0-9, +, /, or =

                var base64test = /[^A-Za-z0-9\+\/\=]/g;

                if (base64test.exec(input)) {
                    console.warn('There were invalid base64 characters in the input text.\nValid base64 characters are A-Z, a-z, 0-9, \'+\', \'/\',and \'=\'\nExpect errors in decoding.');
                }

                input = input.replace(/[^A-Za-z0-9\+\/\=]/g, '');

                while (true) {
                    enc1 = this.KEY_STR.indexOf(input.charAt(i++));
                    enc2 = this.KEY_STR.indexOf(input.charAt(i++));
                    enc3 = this.KEY_STR.indexOf(input.charAt(i++));
                    enc4 = this.KEY_STR.indexOf(input.charAt(i++));
                    chr1 = enc1 << 2 | enc2 >> 4;
                    chr2 = (enc2 & 15) << 4 | enc3 >> 2;
                    chr3 = (enc3 & 3) << 6 | enc4;
                    buf.push(chr1);

                    if (enc3 !== 64) {
                        buf.push(chr2);
                    }

                    if (enc4 !== 64) {
                        buf.push(chr3);
                    }

                    chr1 = chr2 = chr3 = '';
                    enc1 = enc2 = enc3 = enc4 = '';

                    if (!(i < input.length)) {
                        break;
                    }
                }

                return buf;
            }
        }]);

        return ExifRestore;
    }();

    ExifRestore.initClass();
    /*
     * contentloaded.js
     *
     * Author: Diego Perini (diego.perini at gmail.com)
     * Summary: cross-browser wrapper for DOMContentLoaded
     * Updated: 20101020
     * License: MIT
     * Version: 1.2
     *
     * URL:
     * http://javascript.nwbox.com/ContentLoaded/
     * http://javascript.nwbox.com/ContentLoaded/MIT-LICENSE
     */
    // @win window reference
    // @fn function reference

    var contentLoaded = function contentLoaded(win, fn) {
        var done = false;
        var top = true;
        var doc = win.document;
        var root = doc.documentElement;
        var add = doc.addEventListener ? "addEventListener" : "attachEvent";
        var rem = doc.addEventListener ? "removeEventListener" : "detachEvent";
        var pre = doc.addEventListener ? "" : "on";

        var init = function init(e) {
            if (e.type === "readystatechange" && doc.readyState !== "complete") {
                return;
            }

            (e.type === "load" ? win : doc)[rem](pre + e.type, init, false);

            if (!done && (done = true)) {
                return fn.call(win, e.type || e);
            }
        };

        var poll = function poll() {
            try {
                root.doScroll("left");
            } catch (e) {
                setTimeout(poll, 50);
                return;
            }

            return init("poll");
        };

        if (doc.readyState !== "complete") {
            if (doc.createEventObject && root.doScroll) {
                try {
                    top = !win.frameElement;
                } catch (error) {}

                if (top) {
                    poll();
                }
            }

            doc[add](pre + "DOMContentLoaded", init, false);
            doc[add](pre + "readystatechange", init, false);
            return win[add](pre + "load", init, false);
        }
    }; // As a single function to be able to write tests.


    Dropzone._autoDiscoverFunction = function() {
        if (Dropzone.autoDiscover) {
            return Dropzone.discover();
        }
    };

    contentLoaded(window, Dropzone._autoDiscoverFunction);

    function __guard__(value, transform) {
        return typeof value !== 'undefined' && value !== null ? transform(value) : undefined;
    }

    function __guardMethod__(obj, methodName, transform) {
        if (typeof obj !== 'undefined' && obj !== null && typeof obj[methodName] === 'function') {
            return transform(obj, methodName);
        } else {
            return undefined;
        }
    }

    /* WEBPACK VAR INJECTION */
}.call(this, __webpack_require__( /*! ./../../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module))) //# sourceURL=[module]
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvZHJvcHpvbmUvZGlzdC9kcm9wem9uZS5qcz83OWUzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBLDhDQUFhOztBQUViLHVCQUF1QiwyQkFBMkIsMkVBQTJFLGtDQUFrQyxtQkFBbUIsR0FBRyxFQUFFLE9BQU8sa0NBQWtDLDhIQUE4SCxHQUFHLEVBQUUscUJBQXFCOztBQUV4WCwwQ0FBMEMsK0RBQStELDJFQUEyRSxFQUFFLHlFQUF5RSxlQUFlLHNEQUFzRCxFQUFFLEVBQUUsdURBQXVEOztBQUUvWCxnQ0FBZ0MsNEVBQTRFLGlCQUFpQixVQUFVLEdBQUcsOEJBQThCOztBQUV4SyxnQ0FBZ0MsNkRBQTZELHlDQUF5Qyw4Q0FBOEMsaUNBQWlDLG1EQUFtRCx5REFBeUQsRUFBRSxPQUFPLHVDQUF1QyxFQUFFLGlEQUFpRCxHQUFHOztBQUV2YSxpREFBaUQsMEVBQTBFLGFBQWEsRUFBRSxxQ0FBcUM7O0FBRS9LLHVDQUF1Qyx1QkFBdUIsdUZBQXVGLEVBQUUsYUFBYTs7QUFFcEssc0NBQXNDLHdFQUF3RSwwQ0FBMEMsOENBQThDLE1BQU0sd0VBQXdFLEdBQUcsYUFBYSxFQUFFLFlBQVksY0FBYyxFQUFFOztBQUVsVSw2QkFBNkIsZ0dBQWdHLGdEQUFnRCxHQUFHLDJCQUEyQjs7QUFFM00sd0RBQXdELFFBQVEsbUVBQW1FLHdIQUF3SCxnQkFBZ0IsV0FBVyx5QkFBeUIsU0FBUyx3QkFBd0IsNEJBQTRCLGNBQWMsU0FBUyw4QkFBOEIsRUFBRSxxQkFBcUIsVUFBVSxFQUFFLFNBQVMsRUFBRSw4SkFBOEosRUFBRSxrREFBa0QsU0FBUyxrQkFBa0IsMkJBQTJCLEVBQUUsbUJBQW1CLHNCQUFzQiw4QkFBOEIsYUFBYSxFQUFFLHNCQUFzQixlQUFlLFdBQVcsRUFBRSxtQkFBbUIsTUFBTSwrREFBK0QsRUFBRSxVQUFVLHVCQUF1QixFQUFFLEVBQUUsR0FBRzs7QUFFbitCLGlEQUFpRCxnQkFBZ0IsZ0VBQWdFLHdEQUF3RCw2REFBNkQsc0RBQXNELGtIQUFrSDs7QUFFOVosc0NBQXNDLHVEQUF1RCx1Q0FBdUMsU0FBUyxPQUFPLGtCQUFrQixFQUFFLGFBQWE7O0FBRXJMLGlEQUFpRCwwQ0FBMEMsMERBQTBELEVBQUU7O0FBRXZKLDJDQUEyQyxnQkFBZ0Isa0JBQWtCLE9BQU8sMkJBQTJCLHdEQUF3RCxnQ0FBZ0MsdURBQXVELDJEQUEyRCxFQUFFOztBQUUzVCw2REFBNkQsc0VBQXNFLDhEQUE4RCxvQkFBb0I7O0FBRXJOO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDhDQUE4Qzs7QUFFOUM7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4RkFBOEYsYUFBYTtBQUMzRztBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQSw2QkFBNkIsK0JBQStCO0FBQzVEO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxLQUFLO0FBQ0w7QUFDQTs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87OztBQUdQOztBQUVBO0FBQ0E7QUFDQSxPQUFPOzs7QUFHUDtBQUNBO0FBQ0E7QUFDQSxPQUFPOzs7QUFHUCxxQkFBcUIsc0JBQXNCO0FBQzNDOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDZDQUE2QyxFQUFFO0FBQy9DOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsYUFBYSxzQ0FBc0M7QUFDbkQ7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtB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Q0E7QUFDQSxzQ0FBc0Msc0VBQXNFLEVBQUU7O0FBRTlHO0FBQ0E7QUFDQSxLQUFLOzs7QUFHTDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7O0FBR0w7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0EsR0FBRzs7O0FBR0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBLE9BQU87QUFDUCxLQUFLO0FBQ0w7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0EsT0FBTztBQUNQO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0EsT0FBTztBQUNQLEtBQUs7O0FBRUwsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBLEtBQUs7O0FBRUwsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0EsT0FBTztBQUNQLEtBQUs7QUFDTDs7QUFFQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFdBQVc7QUFDWDs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLG9DQUFvQyxpQ0FBaUM7QUFDckU7O0FBRUE7QUFDQTtBQUNBLGVBQWU7QUFDZjtBQUNBLGVBQWU7QUFDZjtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSxXQUFXO0FBQ1g7O0FBRUE7QUFDQTs7QUFFQSxxRUFBcUU7QUFDckU7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0EsNkJBQTZCLG1DQUFtQztBQUNoRTtBQUNBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQSxPQUFPO0FBQ1A7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7QUFDQTtBQUNBLE9BQU8sRUFBRTs7QUFFVDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsV0FBVztBQUNYO0FBQ0EsT0FBTzs7QUFFUDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EseUJBQXlCLGlDQUFpQztBQUMxRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0EsUUFBUTs7O0FBR1I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFdBQVc7QUFDWDtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsYUFBYTs7QUFFYjtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTtBQUNBLFdBQVc7QUFDWDtBQUNBO0FBQ0E7QUFDQSxXQUFXO0FBQ1g7QUFDQTtBQUNBO0FBQ0EsU0FBUztBQUNUO0FBQ0E7QUFDQTs7QUFFQSxPQUFPO0FBQ1A7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSwrQ0FBK0M7O0FBRS9DOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1A7QUFDQTtBQUNBLEtBQUs7O0FBRUwsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0EsK0JBQStCLG1DQUFtQztBQUNsRTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLFNBQVM7QUFDVDtBQUNBOztBQUVBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7O0FBRUE7QUFDQSxLQUFLO0FBQ0w7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTztBQUNQO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7O0FBRUEsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLE9BQU87QUFDUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEtBQUs7QUFDTDtBQUNBOztBQUVBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EsK0JBQStCLG1DQUFtQztBQUNsRTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFNBQVM7QUFDVDtBQUNBLFNBQVM7QUFDVDtBQUNBO0FBQ0E7O0FBRUEsK0NBQStDLG1CQUFtQjtBQUNsRTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsS0FBSzs7QUFFTCxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1AsS0FBSzs7QUFFTCxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLFNBQVM7QUFDVCxPQUFPO0FBQ1AsS0FBSzs7QUFFTCxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxPQUFPO0FBQ1A7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QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLG1CQUFtQjs7QUFFbkI7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsT0FBTzs7QUFFUDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEVBQUU7OztBQUdGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0EiLCJmaWxlIjoiLi9ub2RlX21vZHVsZXMvZHJvcHpvbmUvZGlzdC9kcm9wem9uZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG5mdW5jdGlvbiBfdHlwZW9mKG9iaikgeyBcIkBiYWJlbC9oZWxwZXJzIC0gdHlwZW9mXCI7IGlmICh0eXBlb2YgU3ltYm9sID09PSBcImZ1bmN0aW9uXCIgJiYgdHlwZW9mIFN5bWJvbC5pdGVyYXRvciA9PT0gXCJzeW1ib2xcIikgeyBfdHlwZW9mID0gZnVuY3Rpb24gX3R5cGVvZihvYmopIHsgcmV0dXJuIHR5cGVvZiBvYmo7IH07IH0gZWxzZSB7IF90eXBlb2YgPSBmdW5jdGlvbiBfdHlwZW9mKG9iaikgeyByZXR1cm4gb2JqICYmIHR5cGVvZiBTeW1ib2wgPT09IFwiZnVuY3Rpb25cIiAmJiBvYmouY29uc3RydWN0b3IgPT09IFN5bWJvbCAmJiBvYmogIT09IFN5bWJvbC5wcm90b3R5cGUgPyBcInN5bWJvbFwiIDogdHlwZW9mIG9iajsgfTsgfSByZXR1cm4gX3R5cGVvZihvYmopOyB9XG5cbmZ1bmN0aW9uIF9pbmhlcml0cyhzdWJDbGFzcywgc3VwZXJDbGFzcykgeyBpZiAodHlwZW9mIHN1cGVyQ2xhc3MgIT09IFwiZnVuY3Rpb25cIiAmJiBzdXBlckNsYXNzICE9PSBudWxsKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJTdXBlciBleHByZXNzaW9uIG11c3QgZWl0aGVyIGJlIG51bGwgb3IgYSBmdW5jdGlvblwiKTsgfSBzdWJDbGFzcy5wcm90b3R5cGUgPSBPYmplY3QuY3JlYXRlKHN1cGVyQ2xhc3MgJiYgc3VwZXJDbGFzcy5wcm90b3R5cGUsIHsgY29uc3RydWN0b3I6IHsgdmFsdWU6IHN1YkNsYXNzLCB3cml0YWJsZTogdHJ1ZSwgY29uZmlndXJhYmxlOiB0cnVlIH0gfSk7IGlmIChzdXBlckNsYXNzKSBfc2V0UHJvdG90eXBlT2Yoc3ViQ2xhc3MsIHN1cGVyQ2xhc3MpOyB9XG5cbmZ1bmN0aW9uIF9zZXRQcm90b3R5cGVPZihvLCBwKSB7IF9zZXRQcm90b3R5cGVPZiA9IE9iamVjdC5zZXRQcm90b3R5cGVPZiB8fCBmdW5jdGlvbiBfc2V0UHJvdG90eXBlT2YobywgcCkgeyBvLl9fcHJvdG9fXyA9IHA7IHJldHVybiBvOyB9OyByZXR1cm4gX3NldFByb3RvdHlwZU9mKG8sIHApOyB9XG5cbmZ1bmN0aW9uIF9jcmVhdGVTdXBlcihEZXJpdmVkKSB7IHZhciBoYXNOYXRpdmVSZWZsZWN0Q29uc3RydWN0ID0gX2lzTmF0aXZlUmVmbGVjdENvbnN0cnVjdCgpOyByZXR1cm4gZnVuY3Rpb24gX2NyZWF0ZVN1cGVySW50ZXJuYWwoKSB7IHZhciBTdXBlciA9IF9nZXRQcm90b3R5cGVPZihEZXJpdmVkKSwgcmVzdWx0OyBpZiAoaGFzTmF0aXZlUmVmbGVjdENvbnN0cnVjdCkgeyB2YXIgTmV3VGFyZ2V0ID0gX2dldFByb3RvdHlwZU9mKHRoaXMpLmNvbnN0cnVjdG9yOyByZXN1bHQgPSBSZWZsZWN0LmNvbnN0cnVjdChTdXBlciwgYXJndW1lbnRzLCBOZXdUYXJnZXQpOyB9IGVsc2UgeyByZXN1bHQgPSBTdXBlci5hcHBseSh0aGlzLCBhcmd1bWVudHMpOyB9IHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybih0aGlzLCByZXN1bHQpOyB9OyB9XG5cbmZ1bmN0aW9uIF9wb3NzaWJsZUNvbnN0cnVjdG9yUmV0dXJuKHNlbGYsIGNhbGwpIHsgaWYgKGNhbGwgJiYgKF90eXBlb2YoY2FsbCkgPT09IFwib2JqZWN0XCIgfHwgdHlwZW9mIGNhbGwgPT09IFwiZnVuY3Rpb25cIikpIHsgcmV0dXJuIGNhbGw7IH0gcmV0dXJuIF9hc3NlcnRUaGlzSW5pdGlhbGl6ZWQoc2VsZik7IH1cblxuZnVuY3Rpb24gX2Fzc2VydFRoaXNJbml0aWFsaXplZChzZWxmKSB7IGlmIChzZWxmID09PSB2b2lkIDApIHsgdGhyb3cgbmV3IFJlZmVyZW5jZUVycm9yKFwidGhpcyBoYXNuJ3QgYmVlbiBpbml0aWFsaXNlZCAtIHN1cGVyKCkgaGFzbid0IGJlZW4gY2FsbGVkXCIpOyB9IHJldHVybiBzZWxmOyB9XG5cbmZ1bmN0aW9uIF9pc05hdGl2ZVJlZmxlY3RDb25zdHJ1Y3QoKSB7IGlmICh0eXBlb2YgUmVmbGVjdCA9PT0gXCJ1bmRlZmluZWRcIiB8fCAhUmVmbGVjdC5jb25zdHJ1Y3QpIHJldHVybiBmYWxzZTsgaWYgKFJlZmxlY3QuY29uc3RydWN0LnNoYW0pIHJldHVybiBmYWxzZTsgaWYgKHR5cGVvZiBQcm94eSA9PT0gXCJmdW5jdGlvblwiKSByZXR1cm4gdHJ1ZTsgdHJ5IHsgRGF0ZS5wcm90b3R5cGUudG9TdHJpbmcuY2FsbChSZWZsZWN0LmNvbnN0cnVjdChEYXRlLCBbXSwgZnVuY3Rpb24gKCkge30pKTsgcmV0dXJuIHRydWU7IH0gY2F0Y2ggKGUpIHsgcmV0dXJuIGZhbHNlOyB9IH1cblxuZnVuY3Rpb24gX2dldFByb3RvdHlwZU9mKG8pIHsgX2dldFByb3RvdHlwZU9mID0gT2JqZWN0LnNldFByb3RvdHlwZU9mID8gT2JqZWN0LmdldFByb3RvdHlwZU9mIDogZnVuY3Rpb24gX2dldFByb3RvdHlwZU9mKG8pIHsgcmV0dXJuIG8uX19wcm90b19fIHx8IE9iamVjdC5nZXRQcm90b3R5cGVPZihvKTsgfTsgcmV0dXJuIF9nZXRQcm90b3R5cGVPZihvKTsgfVxuXG5mdW5jdGlvbiBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihvLCBhbGxvd0FycmF5TGlrZSkgeyB2YXIgaXQ7IGlmICh0eXBlb2YgU3ltYm9sID09PSBcInVuZGVmaW5lZFwiIHx8IG9bU3ltYm9sLml0ZXJhdG9yXSA9PSBudWxsKSB7IGlmIChBcnJheS5pc0FycmF5KG8pIHx8IChpdCA9IF91bnN1cHBvcnRlZEl0ZXJhYmxlVG9BcnJheShvKSkgfHwgYWxsb3dBcnJheUxpa2UgJiYgbyAmJiB0eXBlb2Ygby5sZW5ndGggPT09IFwibnVtYmVyXCIpIHsgaWYgKGl0KSBvID0gaXQ7IHZhciBpID0gMDsgdmFyIEYgPSBmdW5jdGlvbiBGKCkge307IHJldHVybiB7IHM6IEYsIG46IGZ1bmN0aW9uIG4oKSB7IGlmIChpID49IG8ubGVuZ3RoKSByZXR1cm4geyBkb25lOiB0cnVlIH07IHJldHVybiB7IGRvbmU6IGZhbHNlLCB2YWx1ZTogb1tpKytdIH07IH0sIGU6IGZ1bmN0aW9uIGUoX2UpIHsgdGhyb3cgX2U7IH0sIGY6IEYgfTsgfSB0aHJvdyBuZXcgVHlwZUVycm9yKFwiSW52YWxpZCBhdHRlbXB0IHRvIGl0ZXJhdGUgbm9uLWl0ZXJhYmxlIGluc3RhbmNlLlxcbkluIG9yZGVyIHRvIGJlIGl0ZXJhYmxlLCBub24tYXJyYXkgb2JqZWN0cyBtdXN0IGhhdmUgYSBbU3ltYm9sLml0ZXJhdG9yXSgpIG1ldGhvZC5cIik7IH0gdmFyIG5vcm1hbENvbXBsZXRpb24gPSB0cnVlLCBkaWRFcnIgPSBmYWxzZSwgZXJyOyByZXR1cm4geyBzOiBmdW5jdGlvbiBzKCkgeyBpdCA9IG9bU3ltYm9sLml0ZXJhdG9yXSgpOyB9LCBuOiBmdW5jdGlvbiBuKCkgeyB2YXIgc3RlcCA9IGl0Lm5leHQoKTsgbm9ybWFsQ29tcGxldGlvbiA9IHN0ZXAuZG9uZTsgcmV0dXJuIHN0ZXA7IH0sIGU6IGZ1bmN0aW9uIGUoX2UyKSB7IGRpZEVyciA9IHRydWU7IGVyciA9IF9lMjsgfSwgZjogZnVuY3Rpb24gZigpIHsgdHJ5IHsgaWYgKCFub3JtYWxDb21wbGV0aW9uICYmIGl0W1wicmV0dXJuXCJdICE9IG51bGwpIGl0W1wicmV0dXJuXCJdKCk7IH0gZmluYWxseSB7IGlmIChkaWRFcnIpIHRocm93IGVycjsgfSB9IH07IH1cblxuZnVuY3Rpb24gX3Vuc3VwcG9ydGVkSXRlcmFibGVUb0FycmF5KG8sIG1pbkxlbikgeyBpZiAoIW8pIHJldHVybjsgaWYgKHR5cGVvZiBvID09PSBcInN0cmluZ1wiKSByZXR1cm4gX2FycmF5TGlrZVRvQXJyYXkobywgbWluTGVuKTsgdmFyIG4gPSBPYmplY3QucHJvdG90eXBlLnRvU3RyaW5nLmNhbGwobykuc2xpY2UoOCwgLTEpOyBpZiAobiA9PT0gXCJPYmplY3RcIiAmJiBvLmNvbnN0cnVjdG9yKSBuID0gby5jb25zdHJ1Y3Rvci5uYW1lOyBpZiAobiA9PT0gXCJNYXBcIiB8fCBuID09PSBcIlNldFwiKSByZXR1cm4gQXJyYXkuZnJvbShvKTsgaWYgKG4gPT09IFwiQXJndW1lbnRzXCIgfHwgL14oPzpVaXxJKW50KD86OHwxNnwzMikoPzpDbGFtcGVkKT9BcnJheSQvLnRlc3QobikpIHJldHVybiBfYXJyYXlMaWtlVG9BcnJheShvLCBtaW5MZW4pOyB9XG5cbmZ1bmN0aW9uIF9hcnJheUxpa2VUb0FycmF5KGFyciwgbGVuKSB7IGlmIChsZW4gPT0gbnVsbCB8fCBsZW4gPiBhcnIubGVuZ3RoKSBsZW4gPSBhcnIubGVuZ3RoOyBmb3IgKHZhciBpID0gMCwgYXJyMiA9IG5ldyBBcnJheShsZW4pOyBpIDwgbGVuOyBpKyspIHsgYXJyMltpXSA9IGFycltpXTsgfSByZXR1cm4gYXJyMjsgfVxuXG5mdW5jdGlvbiBfY2xhc3NDYWxsQ2hlY2soaW5zdGFuY2UsIENvbnN0cnVjdG9yKSB7IGlmICghKGluc3RhbmNlIGluc3RhbmNlb2YgQ29uc3RydWN0b3IpKSB7IHRocm93IG5ldyBUeXBlRXJyb3IoXCJDYW5ub3QgY2FsbCBhIGNsYXNzIGFzIGEgZnVuY3Rpb25cIik7IH0gfVxuXG5mdW5jdGlvbiBfZGVmaW5lUHJvcGVydGllcyh0YXJnZXQsIHByb3BzKSB7IGZvciAodmFyIGkgPSAwOyBpIDwgcHJvcHMubGVuZ3RoOyBpKyspIHsgdmFyIGRlc2NyaXB0b3IgPSBwcm9wc1tpXTsgZGVzY3JpcHRvci5lbnVtZXJhYmxlID0gZGVzY3JpcHRvci5lbnVtZXJhYmxlIHx8IGZhbHNlOyBkZXNjcmlwdG9yLmNvbmZpZ3VyYWJsZSA9IHRydWU7IGlmIChcInZhbHVlXCIgaW4gZGVzY3JpcHRvcikgZGVzY3JpcHRvci53cml0YWJsZSA9IHRydWU7IE9iamVjdC5kZWZpbmVQcm9wZXJ0eSh0YXJnZXQsIGRlc2NyaXB0b3Iua2V5LCBkZXNjcmlwdG9yKTsgfSB9XG5cbmZ1bmN0aW9uIF9jcmVhdGVDbGFzcyhDb25zdHJ1Y3RvciwgcHJvdG9Qcm9wcywgc3RhdGljUHJvcHMpIHsgaWYgKHByb3RvUHJvcHMpIF9kZWZpbmVQcm9wZXJ0aWVzKENvbnN0cnVjdG9yLnByb3RvdHlwZSwgcHJvdG9Qcm9wcyk7IGlmIChzdGF0aWNQcm9wcykgX2RlZmluZVByb3BlcnRpZXMoQ29uc3RydWN0b3IsIHN0YXRpY1Byb3BzKTsgcmV0dXJuIENvbnN0cnVjdG9yOyB9XG5cbi8qXG4gKlxuICogTW9yZSBpbmZvIGF0IFt3d3cuZHJvcHpvbmVqcy5jb21dKGh0dHA6Ly93d3cuZHJvcHpvbmVqcy5jb20pXG4gKlxuICogQ29weXJpZ2h0IChjKSAyMDEyLCBNYXRpYXMgTWVub1xuICpcbiAqIFBlcm1pc3Npb24gaXMgaGVyZWJ5IGdyYW50ZWQsIGZyZWUgb2YgY2hhcmdlLCB0byBhbnkgcGVyc29uIG9idGFpbmluZyBhIGNvcHlcbiAqIG9mIHRoaXMgc29mdHdhcmUgYW5kIGFzc29jaWF0ZWQgZG9jdW1lbnRhdGlvbiBmaWxlcyAodGhlIFwiU29mdHdhcmVcIiksIHRvIGRlYWxcbiAqIGluIHRoZSBTb2Z0d2FyZSB3aXRob3V0IHJlc3RyaWN0aW9uLCBpbmNsdWRpbmcgd2l0aG91dCBsaW1pdGF0aW9uIHRoZSByaWdodHNcbiAqIHRvIHVzZSwgY29weSwgbW9kaWZ5LCBtZXJnZSwgcHVibGlzaCwgZGlzdHJpYnV0ZSwgc3VibGljZW5zZSwgYW5kL29yIHNlbGxcbiAqIGNvcGllcyBvZiB0aGUgU29mdHdhcmUsIGFuZCB0byBwZXJtaXQgcGVyc29ucyB0byB3aG9tIHRoZSBTb2Z0d2FyZSBpc1xuICogZnVybmlzaGVkIHRvIGRvIHNvLCBzdWJqZWN0IHRvIHRoZSBmb2xsb3dpbmcgY29uZGl0aW9uczpcbiAqXG4gKiBUaGUgYWJvdmUgY29weXJpZ2h0IG5vdGljZSBhbmQgdGhpcyBwZXJtaXNzaW9uIG5vdGljZSBzaGFsbCBiZSBpbmNsdWRlZCBpblxuICogYWxsIGNvcGllcyBvciBzdWJzdGFudGlhbCBwb3J0aW9ucyBvZiB0aGUgU29mdHdhcmUuXG4gKlxuICogVEhFIFNPRlRXQVJFIElTIFBST1ZJREVEIFwiQVMgSVNcIiwgV0lUSE9VVCBXQVJSQU5UWSBPRiBBTlkgS0lORCwgRVhQUkVTUyBPUlxuICogSU1QTElFRCwgSU5DTFVESU5HIEJVVCBOT1QgTElNSVRFRCBUTyBUSEUgV0FSUkFOVElFUyBPRiBNRVJDSEFOVEFCSUxJVFksXG4gKiBGSVRORVNTIEZPUiBBIFBBUlRJQ1VMQVIgUFVSUE9TRSBBTkQgTk9OSU5GUklOR0VNRU5ULiBJTiBOTyBFVkVOVCBTSEFMTCBUSEVcbiAqIEFVVEhPUlMgT1IgQ09QWVJJR0hUIEhPTERFUlMgQkUgTElBQkxFIEZPUiBBTlkgQ0xBSU0sIERBTUFHRVMgT1IgT1RIRVJcbiAqIExJQUJJTElUWSwgV0hFVEhFUiBJTiBBTiBBQ1RJT04gT0YgQ09OVFJBQ1QsIFRPUlQgT1IgT1RIRVJXSVNFLCBBUklTSU5HIEZST00sXG4gKiBPVVQgT0YgT1IgSU4gQ09OTkVDVElPTiBXSVRIIFRIRSBTT0ZUV0FSRSBPUiBUSEUgVVNFIE9SIE9USEVSIERFQUxJTkdTIElOXG4gKiBUSEUgU09GVFdBUkUuXG4gKlxuICovXG4vLyBUaGUgRW1pdHRlciBjbGFzcyBwcm92aWRlcyB0aGUgYWJpbGl0eSB0byBjYWxsIGAub24oKWAgb24gRHJvcHpvbmUgdG8gbGlzdGVuXG4vLyB0byBldmVudHMuXG4vLyBJdCBpcyBzdHJvbmdseSBiYXNlZCBvbiBjb21wb25lbnQncyBlbWl0dGVyIGNsYXNzLCBhbmQgSSByZW1vdmVkIHRoZVxuLy8gZnVuY3Rpb25hbGl0eSBiZWNhdXNlIG9mIHRoZSBkZXBlbmRlbmN5IGhlbGwgd2l0aCBkaWZmZXJlbnQgZnJhbWV3b3Jrcy5cbnZhciBFbWl0dGVyID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gRW1pdHRlcigpIHtcbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgRW1pdHRlcik7XG4gIH1cblxuICBfY3JlYXRlQ2xhc3MoRW1pdHRlciwgW3tcbiAgICBrZXk6IFwib25cIixcbiAgICAvLyBBZGQgYW4gZXZlbnQgbGlzdGVuZXIgZm9yIGdpdmVuIGV2ZW50XG4gICAgdmFsdWU6IGZ1bmN0aW9uIG9uKGV2ZW50LCBmbikge1xuICAgICAgdGhpcy5fY2FsbGJhY2tzID0gdGhpcy5fY2FsbGJhY2tzIHx8IHt9OyAvLyBDcmVhdGUgbmFtZXNwYWNlIGZvciB0aGlzIGV2ZW50XG5cbiAgICAgIGlmICghdGhpcy5fY2FsbGJhY2tzW2V2ZW50XSkge1xuICAgICAgICB0aGlzLl9jYWxsYmFja3NbZXZlbnRdID0gW107XG4gICAgICB9XG5cbiAgICAgIHRoaXMuX2NhbGxiYWNrc1tldmVudF0ucHVzaChmbik7XG5cbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJlbWl0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVtaXQoZXZlbnQpIHtcbiAgICAgIHRoaXMuX2NhbGxiYWNrcyA9IHRoaXMuX2NhbGxiYWNrcyB8fCB7fTtcbiAgICAgIHZhciBjYWxsYmFja3MgPSB0aGlzLl9jYWxsYmFja3NbZXZlbnRdO1xuXG4gICAgICBpZiAoY2FsbGJhY2tzKSB7XG4gICAgICAgIGZvciAodmFyIF9sZW4gPSBhcmd1bWVudHMubGVuZ3RoLCBhcmdzID0gbmV3IEFycmF5KF9sZW4gPiAxID8gX2xlbiAtIDEgOiAwKSwgX2tleSA9IDE7IF9rZXkgPCBfbGVuOyBfa2V5KyspIHtcbiAgICAgICAgICBhcmdzW19rZXkgLSAxXSA9IGFyZ3VtZW50c1tfa2V5XTtcbiAgICAgICAgfVxuXG4gICAgICAgIHZhciBfaXRlcmF0b3IgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihjYWxsYmFja3MpLFxuICAgICAgICAgICAgX3N0ZXA7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvci5zKCk7ICEoX3N0ZXAgPSBfaXRlcmF0b3IubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIGNhbGxiYWNrID0gX3N0ZXAudmFsdWU7XG4gICAgICAgICAgICBjYWxsYmFjay5hcHBseSh0aGlzLCBhcmdzKTtcbiAgICAgICAgICB9XG4gICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgIF9pdGVyYXRvci5lKGVycik7XG4gICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgX2l0ZXJhdG9yLmYoKTtcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICByZXR1cm4gdGhpcztcbiAgICB9IC8vIFJlbW92ZSBldmVudCBsaXN0ZW5lciBmb3IgZ2l2ZW4gZXZlbnQuIElmIGZuIGlzIG5vdCBwcm92aWRlZCwgYWxsIGV2ZW50XG4gICAgLy8gbGlzdGVuZXJzIGZvciB0aGF0IGV2ZW50IHdpbGwgYmUgcmVtb3ZlZC4gSWYgbmVpdGhlciBpcyBwcm92aWRlZCwgYWxsXG4gICAgLy8gZXZlbnQgbGlzdGVuZXJzIHdpbGwgYmUgcmVtb3ZlZC5cblxuICB9LCB7XG4gICAga2V5OiBcIm9mZlwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBvZmYoZXZlbnQsIGZuKSB7XG4gICAgICBpZiAoIXRoaXMuX2NhbGxiYWNrcyB8fCBhcmd1bWVudHMubGVuZ3RoID09PSAwKSB7XG4gICAgICAgIHRoaXMuX2NhbGxiYWNrcyA9IHt9O1xuICAgICAgICByZXR1cm4gdGhpcztcbiAgICAgIH0gLy8gc3BlY2lmaWMgZXZlbnRcblxuXG4gICAgICB2YXIgY2FsbGJhY2tzID0gdGhpcy5fY2FsbGJhY2tzW2V2ZW50XTtcblxuICAgICAgaWYgKCFjYWxsYmFja3MpIHtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgICB9IC8vIHJlbW92ZSBhbGwgaGFuZGxlcnNcblxuXG4gICAgICBpZiAoYXJndW1lbnRzLmxlbmd0aCA9PT0gMSkge1xuICAgICAgICBkZWxldGUgdGhpcy5fY2FsbGJhY2tzW2V2ZW50XTtcbiAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgICB9IC8vIHJlbW92ZSBzcGVjaWZpYyBoYW5kbGVyXG5cblxuICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBjYWxsYmFja3MubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgdmFyIGNhbGxiYWNrID0gY2FsbGJhY2tzW2ldO1xuXG4gICAgICAgIGlmIChjYWxsYmFjayA9PT0gZm4pIHtcbiAgICAgICAgICBjYWxsYmFja3Muc3BsaWNlKGksIDEpO1xuICAgICAgICAgIGJyZWFrO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBFbWl0dGVyO1xufSgpO1xuXG52YXIgRHJvcHpvbmUgPSAvKiNfX1BVUkVfXyovZnVuY3Rpb24gKF9FbWl0dGVyKSB7XG4gIF9pbmhlcml0cyhEcm9wem9uZSwgX0VtaXR0ZXIpO1xuXG4gIHZhciBfc3VwZXIgPSBfY3JlYXRlU3VwZXIoRHJvcHpvbmUpO1xuXG4gIF9jcmVhdGVDbGFzcyhEcm9wem9uZSwgbnVsbCwgW3tcbiAgICBrZXk6IFwiaW5pdENsYXNzXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGluaXRDbGFzcygpIHtcbiAgICAgIC8vIEV4cG9zaW5nIHRoZSBlbWl0dGVyIGNsYXNzLCBtYWlubHkgZm9yIHRlc3RzXG4gICAgICB0aGlzLnByb3RvdHlwZS5FbWl0dGVyID0gRW1pdHRlcjtcbiAgICAgIC8qXG4gICAgICAgVGhpcyBpcyBhIGxpc3Qgb2YgYWxsIGF2YWlsYWJsZSBldmVudHMgeW91IGNhbiByZWdpc3RlciBvbiBhIGRyb3B6b25lIG9iamVjdC5cbiAgICAgICAgWW91IGNhbiByZWdpc3RlciBhbiBldmVudCBoYW5kbGVyIGxpa2UgdGhpczpcbiAgICAgICAgZHJvcHpvbmUub24oXCJkcmFnRW50ZXJcIiwgZnVuY3Rpb24oKSB7IH0pO1xuICAgICAgICAqL1xuXG4gICAgICB0aGlzLnByb3RvdHlwZS5ldmVudHMgPSBbXCJkcm9wXCIsIFwiZHJhZ3N0YXJ0XCIsIFwiZHJhZ2VuZFwiLCBcImRyYWdlbnRlclwiLCBcImRyYWdvdmVyXCIsIFwiZHJhZ2xlYXZlXCIsIFwiYWRkZWRmaWxlXCIsIFwiYWRkZWRmaWxlc1wiLCBcInJlbW92ZWRmaWxlXCIsIFwidGh1bWJuYWlsXCIsIFwiZXJyb3JcIiwgXCJlcnJvcm11bHRpcGxlXCIsIFwicHJvY2Vzc2luZ1wiLCBcInByb2Nlc3NpbmdtdWx0aXBsZVwiLCBcInVwbG9hZHByb2dyZXNzXCIsIFwidG90YWx1cGxvYWRwcm9ncmVzc1wiLCBcInNlbmRpbmdcIiwgXCJzZW5kaW5nbXVsdGlwbGVcIiwgXCJzdWNjZXNzXCIsIFwic3VjY2Vzc211bHRpcGxlXCIsIFwiY2FuY2VsZWRcIiwgXCJjYW5jZWxlZG11bHRpcGxlXCIsIFwiY29tcGxldGVcIiwgXCJjb21wbGV0ZW11bHRpcGxlXCIsIFwicmVzZXRcIiwgXCJtYXhmaWxlc2V4Y2VlZGVkXCIsIFwibWF4ZmlsZXNyZWFjaGVkXCIsIFwicXVldWVjb21wbGV0ZVwiXTtcbiAgICAgIHRoaXMucHJvdG90eXBlLmRlZmF1bHRPcHRpb25zID0ge1xuICAgICAgICAvKipcbiAgICAgICAgICogSGFzIHRvIGJlIHNwZWNpZmllZCBvbiBlbGVtZW50cyBvdGhlciB0aGFuIGZvcm0gKG9yIHdoZW4gdGhlIGZvcm1cbiAgICAgICAgICogZG9lc24ndCBoYXZlIGFuIGBhY3Rpb25gIGF0dHJpYnV0ZSkuIFlvdSBjYW4gYWxzb1xuICAgICAgICAgKiBwcm92aWRlIGEgZnVuY3Rpb24gdGhhdCB3aWxsIGJlIGNhbGxlZCB3aXRoIGBmaWxlc2AgYW5kXG4gICAgICAgICAqIG11c3QgcmV0dXJuIHRoZSB1cmwgKHNpbmNlIGB2My4xMi4wYClcbiAgICAgICAgICovXG4gICAgICAgIHVybDogbnVsbCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogQ2FuIGJlIGNoYW5nZWQgdG8gYFwicHV0XCJgIGlmIG5lY2Vzc2FyeS4gWW91IGNhbiBhbHNvIHByb3ZpZGUgYSBmdW5jdGlvblxuICAgICAgICAgKiB0aGF0IHdpbGwgYmUgY2FsbGVkIHdpdGggYGZpbGVzYCBhbmQgbXVzdCByZXR1cm4gdGhlIG1ldGhvZCAoc2luY2UgYHYzLjEyLjBgKS5cbiAgICAgICAgICovXG4gICAgICAgIG1ldGhvZDogXCJwb3N0XCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIFdpbGwgYmUgc2V0IG9uIHRoZSBYSFJlcXVlc3QuXG4gICAgICAgICAqL1xuICAgICAgICB3aXRoQ3JlZGVudGlhbHM6IGZhbHNlLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgdGltZW91dCBmb3IgdGhlIFhIUiByZXF1ZXN0cyBpbiBtaWxsaXNlY29uZHMgKHNpbmNlIGB2NC40LjBgKS5cbiAgICAgICAgICovXG4gICAgICAgIHRpbWVvdXQ6IDMwMDAwLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBIb3cgbWFueSBmaWxlIHVwbG9hZHMgdG8gcHJvY2VzcyBpbiBwYXJhbGxlbCAoU2VlIHRoZVxuICAgICAgICAgKiBFbnF1ZXVpbmcgZmlsZSB1cGxvYWRzIGRvY3VtZW50YXRpb24gc2VjdGlvbiBmb3IgbW9yZSBpbmZvKVxuICAgICAgICAgKi9cbiAgICAgICAgcGFyYWxsZWxVcGxvYWRzOiAyLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBXaGV0aGVyIHRvIHNlbmQgbXVsdGlwbGUgZmlsZXMgaW4gb25lIHJlcXVlc3QuIElmXG4gICAgICAgICAqIHRoaXMgaXQgc2V0IHRvIHRydWUsIHRoZW4gdGhlIGZhbGxiYWNrIGZpbGUgaW5wdXQgZWxlbWVudCB3aWxsXG4gICAgICAgICAqIGhhdmUgdGhlIGBtdWx0aXBsZWAgYXR0cmlidXRlIGFzIHdlbGwuIFRoaXMgb3B0aW9uIHdpbGxcbiAgICAgICAgICogYWxzbyB0cmlnZ2VyIGFkZGl0aW9uYWwgZXZlbnRzIChsaWtlIGBwcm9jZXNzaW5nbXVsdGlwbGVgKS4gU2VlIHRoZSBldmVudHNcbiAgICAgICAgICogZG9jdW1lbnRhdGlvbiBzZWN0aW9uIGZvciBtb3JlIGluZm9ybWF0aW9uLlxuICAgICAgICAgKi9cbiAgICAgICAgdXBsb2FkTXVsdGlwbGU6IGZhbHNlLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBXaGV0aGVyIHlvdSB3YW50IGZpbGVzIHRvIGJlIHVwbG9hZGVkIGluIGNodW5rcyB0byB5b3VyIHNlcnZlci4gVGhpcyBjYW4ndCBiZVxuICAgICAgICAgKiB1c2VkIGluIGNvbWJpbmF0aW9uIHdpdGggYHVwbG9hZE11bHRpcGxlYC5cbiAgICAgICAgICpcbiAgICAgICAgICogU2VlIFtjaHVua3NVcGxvYWRlZF0oI2NvbmZpZy1jaHVua3NVcGxvYWRlZCkgZm9yIHRoZSBjYWxsYmFjayB0byBmaW5hbGlzZSBhbiB1cGxvYWQuXG4gICAgICAgICAqL1xuICAgICAgICBjaHVua2luZzogZmFsc2UsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIGBjaHVua2luZ2AgaXMgZW5hYmxlZCwgdGhpcyBkZWZpbmVzIHdoZXRoZXIgKipldmVyeSoqIGZpbGUgc2hvdWxkIGJlIGNodW5rZWQsXG4gICAgICAgICAqIGV2ZW4gaWYgdGhlIGZpbGUgc2l6ZSBpcyBiZWxvdyBjaHVua1NpemUuIFRoaXMgbWVhbnMsIHRoYXQgdGhlIGFkZGl0aW9uYWwgY2h1bmtcbiAgICAgICAgICogZm9ybSBkYXRhIHdpbGwgYmUgc3VibWl0dGVkIGFuZCB0aGUgYGNodW5rc1VwbG9hZGVkYCBjYWxsYmFjayB3aWxsIGJlIGludm9rZWQuXG4gICAgICAgICAqL1xuICAgICAgICBmb3JjZUNodW5raW5nOiBmYWxzZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSWYgYGNodW5raW5nYCBpcyBgdHJ1ZWAsIHRoZW4gdGhpcyBkZWZpbmVzIHRoZSBjaHVuayBzaXplIGluIGJ5dGVzLlxuICAgICAgICAgKi9cbiAgICAgICAgY2h1bmtTaXplOiAyMDAwMDAwLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBgdHJ1ZWAsIHRoZSBpbmRpdmlkdWFsIGNodW5rcyBvZiBhIGZpbGUgYXJlIGJlaW5nIHVwbG9hZGVkIHNpbXVsdGFuZW91c2x5LlxuICAgICAgICAgKi9cbiAgICAgICAgcGFyYWxsZWxDaHVua1VwbG9hZHM6IGZhbHNlLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBXaGV0aGVyIGEgY2h1bmsgc2hvdWxkIGJlIHJldHJpZWQgaWYgaXQgZmFpbHMuXG4gICAgICAgICAqL1xuICAgICAgICByZXRyeUNodW5rczogZmFsc2UsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIGByZXRyeUNodW5rc2AgaXMgdHJ1ZSwgaG93IG1hbnkgdGltZXMgc2hvdWxkIGl0IGJlIHJldHJpZWQuXG4gICAgICAgICAqL1xuICAgICAgICByZXRyeUNodW5rc0xpbWl0OiAzLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBub3QgYG51bGxgIGRlZmluZXMgaG93IG1hbnkgZmlsZXMgdGhpcyBEcm9wem9uZSBoYW5kbGVzLiBJZiBpdCBleGNlZWRzLFxuICAgICAgICAgKiB0aGUgZXZlbnQgYG1heGZpbGVzZXhjZWVkZWRgIHdpbGwgYmUgY2FsbGVkLiBUaGUgZHJvcHpvbmUgZWxlbWVudCBnZXRzIHRoZVxuICAgICAgICAgKiBjbGFzcyBgZHotbWF4LWZpbGVzLXJlYWNoZWRgIGFjY29yZGluZ2x5IHNvIHlvdSBjYW4gcHJvdmlkZSB2aXN1YWwgZmVlZGJhY2suXG4gICAgICAgICAqL1xuICAgICAgICBtYXhGaWxlc2l6ZTogMjU2LFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgbmFtZSBvZiB0aGUgZmlsZSBwYXJhbSB0aGF0IGdldHMgdHJhbnNmZXJyZWQuXG4gICAgICAgICAqICoqTk9URSoqOiBJZiB5b3UgaGF2ZSB0aGUgb3B0aW9uICBgdXBsb2FkTXVsdGlwbGVgIHNldCB0byBgdHJ1ZWAsIHRoZW5cbiAgICAgICAgICogRHJvcHpvbmUgd2lsbCBhcHBlbmQgYFtdYCB0byB0aGUgbmFtZS5cbiAgICAgICAgICovXG4gICAgICAgIHBhcmFtTmFtZTogXCJmaWxlXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIFdoZXRoZXIgdGh1bWJuYWlscyBmb3IgaW1hZ2VzIHNob3VsZCBiZSBnZW5lcmF0ZWRcbiAgICAgICAgICovXG4gICAgICAgIGNyZWF0ZUltYWdlVGh1bWJuYWlsczogdHJ1ZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSW4gTUIuIFdoZW4gdGhlIGZpbGVuYW1lIGV4Y2VlZHMgdGhpcyBsaW1pdCwgdGhlIHRodW1ibmFpbCB3aWxsIG5vdCBiZSBnZW5lcmF0ZWQuXG4gICAgICAgICAqL1xuICAgICAgICBtYXhUaHVtYm5haWxGaWxlc2l6ZTogMTAsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIGBudWxsYCwgdGhlIHJhdGlvIG9mIHRoZSBpbWFnZSB3aWxsIGJlIHVzZWQgdG8gY2FsY3VsYXRlIGl0LlxuICAgICAgICAgKi9cbiAgICAgICAgdGh1bWJuYWlsV2lkdGg6IDEyMCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogVGhlIHNhbWUgYXMgYHRodW1ibmFpbFdpZHRoYC4gSWYgYm90aCBhcmUgbnVsbCwgaW1hZ2VzIHdpbGwgbm90IGJlIHJlc2l6ZWQuXG4gICAgICAgICAqL1xuICAgICAgICB0aHVtYm5haWxIZWlnaHQ6IDEyMCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSG93IHRoZSBpbWFnZXMgc2hvdWxkIGJlIHNjYWxlZCBkb3duIGluIGNhc2UgYm90aCwgYHRodW1ibmFpbFdpZHRoYCBhbmQgYHRodW1ibmFpbEhlaWdodGAgYXJlIHByb3ZpZGVkLlxuICAgICAgICAgKiBDYW4gYmUgZWl0aGVyIGBjb250YWluYCBvciBgY3JvcGAuXG4gICAgICAgICAqL1xuICAgICAgICB0aHVtYm5haWxNZXRob2Q6ICdjcm9wJyxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSWYgc2V0LCBpbWFnZXMgd2lsbCBiZSByZXNpemVkIHRvIHRoZXNlIGRpbWVuc2lvbnMgYmVmb3JlIGJlaW5nICoqdXBsb2FkZWQqKi5cbiAgICAgICAgICogSWYgb25seSBvbmUsIGByZXNpemVXaWR0aGAgKipvcioqIGByZXNpemVIZWlnaHRgIGlzIHByb3ZpZGVkLCB0aGUgb3JpZ2luYWwgYXNwZWN0XG4gICAgICAgICAqIHJhdGlvIG9mIHRoZSBmaWxlIHdpbGwgYmUgcHJlc2VydmVkLlxuICAgICAgICAgKlxuICAgICAgICAgKiBUaGUgYG9wdGlvbnMudHJhbnNmb3JtRmlsZWAgZnVuY3Rpb24gdXNlcyB0aGVzZSBvcHRpb25zLCBzbyBpZiB0aGUgYHRyYW5zZm9ybUZpbGVgIGZ1bmN0aW9uXG4gICAgICAgICAqIGlzIG92ZXJyaWRkZW4sIHRoZXNlIG9wdGlvbnMgZG9uJ3QgZG8gYW55dGhpbmcuXG4gICAgICAgICAqL1xuICAgICAgICByZXNpemVXaWR0aDogbnVsbCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogU2VlIGByZXNpemVXaWR0aGAuXG4gICAgICAgICAqL1xuICAgICAgICByZXNpemVIZWlnaHQ6IG51bGwsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIFRoZSBtaW1lIHR5cGUgb2YgdGhlIHJlc2l6ZWQgaW1hZ2UgKGJlZm9yZSBpdCBnZXRzIHVwbG9hZGVkIHRvIHRoZSBzZXJ2ZXIpLlxuICAgICAgICAgKiBJZiBgbnVsbGAgdGhlIG9yaWdpbmFsIG1pbWUgdHlwZSB3aWxsIGJlIHVzZWQuIFRvIGZvcmNlIGpwZWcsIGZvciBleGFtcGxlLCB1c2UgYGltYWdlL2pwZWdgLlxuICAgICAgICAgKiBTZWUgYHJlc2l6ZVdpZHRoYCBmb3IgbW9yZSBpbmZvcm1hdGlvbi5cbiAgICAgICAgICovXG4gICAgICAgIHJlc2l6ZU1pbWVUeXBlOiBudWxsLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgcXVhbGl0eSBvZiB0aGUgcmVzaXplZCBpbWFnZXMuIFNlZSBgcmVzaXplV2lkdGhgLlxuICAgICAgICAgKi9cbiAgICAgICAgcmVzaXplUXVhbGl0eTogMC44LFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBIb3cgdGhlIGltYWdlcyBzaG91bGQgYmUgc2NhbGVkIGRvd24gaW4gY2FzZSBib3RoLCBgcmVzaXplV2lkdGhgIGFuZCBgcmVzaXplSGVpZ2h0YCBhcmUgcHJvdmlkZWQuXG4gICAgICAgICAqIENhbiBiZSBlaXRoZXIgYGNvbnRhaW5gIG9yIGBjcm9wYC5cbiAgICAgICAgICovXG4gICAgICAgIHJlc2l6ZU1ldGhvZDogJ2NvbnRhaW4nLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgYmFzZSB0aGF0IGlzIHVzZWQgdG8gY2FsY3VsYXRlIHRoZSBmaWxlc2l6ZS4gWW91IGNhbiBjaGFuZ2UgdGhpcyB0b1xuICAgICAgICAgKiAxMDI0IGlmIHlvdSB3b3VsZCByYXRoZXIgZGlzcGxheSBraWJpYnl0ZXMsIG1lYmlieXRlcywgZXRjLi4uXG4gICAgICAgICAqIDEwMjQgaXMgdGVjaG5pY2FsbHkgaW5jb3JyZWN0LCBiZWNhdXNlIGAxMDI0IGJ5dGVzYCBhcmUgYDEga2liaWJ5dGVgIG5vdCBgMSBraWxvYnl0ZWAuXG4gICAgICAgICAqIFlvdSBjYW4gY2hhbmdlIHRoaXMgdG8gYDEwMjRgIGlmIHlvdSBkb24ndCBjYXJlIGFib3V0IHZhbGlkaXR5LlxuICAgICAgICAgKi9cbiAgICAgICAgZmlsZXNpemVCYXNlOiAxMDAwLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBDYW4gYmUgdXNlZCB0byBsaW1pdCB0aGUgbWF4aW11bSBudW1iZXIgb2YgZmlsZXMgdGhhdCB3aWxsIGJlIGhhbmRsZWQgYnkgdGhpcyBEcm9wem9uZVxuICAgICAgICAgKi9cbiAgICAgICAgbWF4RmlsZXM6IG51bGwsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIEFuIG9wdGlvbmFsIG9iamVjdCB0byBzZW5kIGFkZGl0aW9uYWwgaGVhZGVycyB0byB0aGUgc2VydmVyLiBFZzpcbiAgICAgICAgICogYHsgXCJNeS1Bd2Vzb21lLUhlYWRlclwiOiBcImhlYWRlciB2YWx1ZVwiIH1gXG4gICAgICAgICAqL1xuICAgICAgICBoZWFkZXJzOiBudWxsLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBgdHJ1ZWAsIHRoZSBkcm9wem9uZSBlbGVtZW50IGl0c2VsZiB3aWxsIGJlIGNsaWNrYWJsZSwgaWYgYGZhbHNlYFxuICAgICAgICAgKiBub3RoaW5nIHdpbGwgYmUgY2xpY2thYmxlLlxuICAgICAgICAgKlxuICAgICAgICAgKiBZb3UgY2FuIGFsc28gcGFzcyBhbiBIVE1MIGVsZW1lbnQsIGEgQ1NTIHNlbGVjdG9yIChmb3IgbXVsdGlwbGUgZWxlbWVudHMpXG4gICAgICAgICAqIG9yIGFuIGFycmF5IG9mIHRob3NlLiBJbiB0aGF0IGNhc2UsIGFsbCBvZiB0aG9zZSBlbGVtZW50cyB3aWxsIHRyaWdnZXIgYW5cbiAgICAgICAgICogdXBsb2FkIHdoZW4gY2xpY2tlZC5cbiAgICAgICAgICovXG4gICAgICAgIGNsaWNrYWJsZTogdHJ1ZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogV2hldGhlciBoaWRkZW4gZmlsZXMgaW4gZGlyZWN0b3JpZXMgc2hvdWxkIGJlIGlnbm9yZWQuXG4gICAgICAgICAqL1xuICAgICAgICBpZ25vcmVIaWRkZW5GaWxlczogdHJ1ZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogVGhlIGRlZmF1bHQgaW1wbGVtZW50YXRpb24gb2YgYGFjY2VwdGAgY2hlY2tzIHRoZSBmaWxlJ3MgbWltZSB0eXBlIG9yXG4gICAgICAgICAqIGV4dGVuc2lvbiBhZ2FpbnN0IHRoaXMgbGlzdC4gVGhpcyBpcyBhIGNvbW1hIHNlcGFyYXRlZCBsaXN0IG9mIG1pbWVcbiAgICAgICAgICogdHlwZXMgb3IgZmlsZSBleHRlbnNpb25zLlxuICAgICAgICAgKlxuICAgICAgICAgKiBFZy46IGBpbWFnZS8qLGFwcGxpY2F0aW9uL3BkZiwucHNkYFxuICAgICAgICAgKlxuICAgICAgICAgKiBJZiB0aGUgRHJvcHpvbmUgaXMgYGNsaWNrYWJsZWAgdGhpcyBvcHRpb24gd2lsbCBhbHNvIGJlIHVzZWQgYXNcbiAgICAgICAgICogW2BhY2NlcHRgXShodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL0hUTUwvRWxlbWVudC9pbnB1dCNhdHRyLWFjY2VwdClcbiAgICAgICAgICogcGFyYW1ldGVyIG9uIHRoZSBoaWRkZW4gZmlsZSBpbnB1dCBhcyB3ZWxsLlxuICAgICAgICAgKi9cbiAgICAgICAgYWNjZXB0ZWRGaWxlczogbnVsbCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogKipEZXByZWNhdGVkISoqXG4gICAgICAgICAqIFVzZSBhY2NlcHRlZEZpbGVzIGluc3RlYWQuXG4gICAgICAgICAqL1xuICAgICAgICBhY2NlcHRlZE1pbWVUeXBlczogbnVsbCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSWYgZmFsc2UsIGZpbGVzIHdpbGwgYmUgYWRkZWQgdG8gdGhlIHF1ZXVlIGJ1dCB0aGUgcXVldWUgd2lsbCBub3QgYmVcbiAgICAgICAgICogcHJvY2Vzc2VkIGF1dG9tYXRpY2FsbHkuXG4gICAgICAgICAqIFRoaXMgY2FuIGJlIHVzZWZ1bCBpZiB5b3UgbmVlZCBzb21lIGFkZGl0aW9uYWwgdXNlciBpbnB1dCBiZWZvcmUgc2VuZGluZ1xuICAgICAgICAgKiBmaWxlcyAob3IgaWYgeW91IHdhbnQgd2FudCBhbGwgZmlsZXMgc2VudCBhdCBvbmNlKS5cbiAgICAgICAgICogSWYgeW91J3JlIHJlYWR5IHRvIHNlbmQgdGhlIGZpbGUgc2ltcGx5IGNhbGwgYG15RHJvcHpvbmUucHJvY2Vzc1F1ZXVlKClgLlxuICAgICAgICAgKlxuICAgICAgICAgKiBTZWUgdGhlIFtlbnF1ZXVpbmcgZmlsZSB1cGxvYWRzXSgjZW5xdWV1aW5nLWZpbGUtdXBsb2FkcykgZG9jdW1lbnRhdGlvblxuICAgICAgICAgKiBzZWN0aW9uIGZvciBtb3JlIGluZm9ybWF0aW9uLlxuICAgICAgICAgKi9cbiAgICAgICAgYXV0b1Byb2Nlc3NRdWV1ZTogdHJ1ZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogSWYgZmFsc2UsIGZpbGVzIGFkZGVkIHRvIHRoZSBkcm9wem9uZSB3aWxsIG5vdCBiZSBxdWV1ZWQgYnkgZGVmYXVsdC5cbiAgICAgICAgICogWW91J2xsIGhhdmUgdG8gY2FsbCBgZW5xdWV1ZUZpbGUoZmlsZSlgIG1hbnVhbGx5LlxuICAgICAgICAgKi9cbiAgICAgICAgYXV0b1F1ZXVlOiB0cnVlLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBgdHJ1ZWAsIHRoaXMgd2lsbCBhZGQgYSBsaW5rIHRvIGV2ZXJ5IGZpbGUgcHJldmlldyB0byByZW1vdmUgb3IgY2FuY2VsIChpZlxuICAgICAgICAgKiBhbHJlYWR5IHVwbG9hZGluZykgdGhlIGZpbGUuIFRoZSBgZGljdENhbmNlbFVwbG9hZGAsIGBkaWN0Q2FuY2VsVXBsb2FkQ29uZmlybWF0aW9uYFxuICAgICAgICAgKiBhbmQgYGRpY3RSZW1vdmVGaWxlYCBvcHRpb25zIGFyZSB1c2VkIGZvciB0aGUgd29yZGluZy5cbiAgICAgICAgICovXG4gICAgICAgIGFkZFJlbW92ZUxpbmtzOiBmYWxzZSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogRGVmaW5lcyB3aGVyZSB0byBkaXNwbGF5IHRoZSBmaWxlIHByZXZpZXdzIOKAkyBpZiBgbnVsbGAgdGhlXG4gICAgICAgICAqIERyb3B6b25lIGVsZW1lbnQgaXRzZWxmIGlzIHVzZWQuIENhbiBiZSBhIHBsYWluIGBIVE1MRWxlbWVudGAgb3IgYSBDU1NcbiAgICAgICAgICogc2VsZWN0b3IuIFRoZSBlbGVtZW50IHNob3VsZCBoYXZlIHRoZSBgZHJvcHpvbmUtcHJldmlld3NgIGNsYXNzIHNvXG4gICAgICAgICAqIHRoZSBwcmV2aWV3cyBhcmUgZGlzcGxheWVkIHByb3Blcmx5LlxuICAgICAgICAgKi9cbiAgICAgICAgcHJldmlld3NDb250YWluZXI6IG51bGwsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIFRoaXMgaXMgdGhlIGVsZW1lbnQgdGhlIGhpZGRlbiBpbnB1dCBmaWVsZCAod2hpY2ggaXMgdXNlZCB3aGVuIGNsaWNraW5nIG9uIHRoZVxuICAgICAgICAgKiBkcm9wem9uZSB0byB0cmlnZ2VyIGZpbGUgc2VsZWN0aW9uKSB3aWxsIGJlIGFwcGVuZGVkIHRvLiBUaGlzIG1pZ2h0XG4gICAgICAgICAqIGJlIGltcG9ydGFudCBpbiBjYXNlIHlvdSB1c2UgZnJhbWV3b3JrcyB0byBzd2l0Y2ggdGhlIGNvbnRlbnQgb2YgeW91ciBwYWdlLlxuICAgICAgICAgKlxuICAgICAgICAgKiBDYW4gYmUgYSBzZWxlY3RvciBzdHJpbmcsIG9yIGFuIGVsZW1lbnQgZGlyZWN0bHkuXG4gICAgICAgICAqL1xuICAgICAgICBoaWRkZW5JbnB1dENvbnRhaW5lcjogXCJib2R5XCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIG51bGwsIG5vIGNhcHR1cmUgdHlwZSB3aWxsIGJlIHNwZWNpZmllZFxuICAgICAgICAgKiBJZiBjYW1lcmEsIG1vYmlsZSBkZXZpY2VzIHdpbGwgc2tpcCB0aGUgZmlsZSBzZWxlY3Rpb24gYW5kIGNob29zZSBjYW1lcmFcbiAgICAgICAgICogSWYgbWljcm9waG9uZSwgbW9iaWxlIGRldmljZXMgd2lsbCBza2lwIHRoZSBmaWxlIHNlbGVjdGlvbiBhbmQgY2hvb3NlIHRoZSBtaWNyb3Bob25lXG4gICAgICAgICAqIElmIGNhbWNvcmRlciwgbW9iaWxlIGRldmljZXMgd2lsbCBza2lwIHRoZSBmaWxlIHNlbGVjdGlvbiBhbmQgY2hvb3NlIHRoZSBjYW1lcmEgaW4gdmlkZW8gbW9kZVxuICAgICAgICAgKiBPbiBhcHBsZSBkZXZpY2VzIG11bHRpcGxlIG11c3QgYmUgc2V0IHRvIGZhbHNlLiAgQWNjZXB0ZWRGaWxlcyBtYXkgbmVlZCB0b1xuICAgICAgICAgKiBiZSBzZXQgdG8gYW4gYXBwcm9wcmlhdGUgbWltZSB0eXBlIChlLmcuIFwiaW1hZ2UvKlwiLCBcImF1ZGlvLypcIiwgb3IgXCJ2aWRlby8qXCIpLlxuICAgICAgICAgKi9cbiAgICAgICAgY2FwdHVyZTogbnVsbCxcblxuICAgICAgICAvKipcbiAgICAgICAgICogKipEZXByZWNhdGVkKiouIFVzZSBgcmVuYW1lRmlsZWAgaW5zdGVhZC5cbiAgICAgICAgICovXG4gICAgICAgIHJlbmFtZUZpbGVuYW1lOiBudWxsLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBBIGZ1bmN0aW9uIHRoYXQgaXMgaW52b2tlZCBiZWZvcmUgdGhlIGZpbGUgaXMgdXBsb2FkZWQgdG8gdGhlIHNlcnZlciBhbmQgcmVuYW1lcyB0aGUgZmlsZS5cbiAgICAgICAgICogVGhpcyBmdW5jdGlvbiBnZXRzIHRoZSBgRmlsZWAgYXMgYXJndW1lbnQgYW5kIGNhbiB1c2UgdGhlIGBmaWxlLm5hbWVgLiBUaGUgYWN0dWFsIG5hbWUgb2YgdGhlXG4gICAgICAgICAqIGZpbGUgdGhhdCBnZXRzIHVzZWQgZHVyaW5nIHRoZSB1cGxvYWQgY2FuIGJlIGFjY2Vzc2VkIHRocm91Z2ggYGZpbGUudXBsb2FkLmZpbGVuYW1lYC5cbiAgICAgICAgICovXG4gICAgICAgIHJlbmFtZUZpbGU6IG51bGwsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIGB0cnVlYCB0aGUgZmFsbGJhY2sgd2lsbCBiZSBmb3JjZWQuIFRoaXMgaXMgdmVyeSB1c2VmdWwgdG8gdGVzdCB5b3VyIHNlcnZlclxuICAgICAgICAgKiBpbXBsZW1lbnRhdGlvbnMgZmlyc3QgYW5kIG1ha2Ugc3VyZSB0aGF0IGV2ZXJ5dGhpbmcgd29ya3MgYXNcbiAgICAgICAgICogZXhwZWN0ZWQgd2l0aG91dCBkcm9wem9uZSBpZiB5b3UgZXhwZXJpZW5jZSBwcm9ibGVtcywgYW5kIHRvIHRlc3RcbiAgICAgICAgICogaG93IHlvdXIgZmFsbGJhY2tzIHdpbGwgbG9vay5cbiAgICAgICAgICovXG4gICAgICAgIGZvcmNlRmFsbGJhY2s6IGZhbHNlLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgdGV4dCB1c2VkIGJlZm9yZSBhbnkgZmlsZXMgYXJlIGRyb3BwZWQuXG4gICAgICAgICAqL1xuICAgICAgICBkaWN0RGVmYXVsdE1lc3NhZ2U6IFwiRHJvcCBmaWxlcyBoZXJlIHRvIHVwbG9hZFwiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgdGV4dCB0aGF0IHJlcGxhY2VzIHRoZSBkZWZhdWx0IG1lc3NhZ2UgdGV4dCBpdCB0aGUgYnJvd3NlciBpcyBub3Qgc3VwcG9ydGVkLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdEZhbGxiYWNrTWVzc2FnZTogXCJZb3VyIGJyb3dzZXIgZG9lcyBub3Qgc3VwcG9ydCBkcmFnJ24nZHJvcCBmaWxlIHVwbG9hZHMuXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIFRoZSB0ZXh0IHRoYXQgd2lsbCBiZSBhZGRlZCBiZWZvcmUgdGhlIGZhbGxiYWNrIGZvcm0uXG4gICAgICAgICAqIElmIHlvdSBwcm92aWRlIGEgIGZhbGxiYWNrIGVsZW1lbnQgeW91cnNlbGYsIG9yIGlmIHRoaXMgb3B0aW9uIGlzIGBudWxsYCB0aGlzIHdpbGxcbiAgICAgICAgICogYmUgaWdub3JlZC5cbiAgICAgICAgICovXG4gICAgICAgIGRpY3RGYWxsYmFja1RleHQ6IFwiUGxlYXNlIHVzZSB0aGUgZmFsbGJhY2sgZm9ybSBiZWxvdyB0byB1cGxvYWQgeW91ciBmaWxlcyBsaWtlIGluIHRoZSBvbGRlbiBkYXlzLlwiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiB0aGUgZmlsZXNpemUgaXMgdG9vIGJpZy5cbiAgICAgICAgICogYHt7ZmlsZXNpemV9fWAgYW5kIGB7e21heEZpbGVzaXplfX1gIHdpbGwgYmUgcmVwbGFjZWQgd2l0aCB0aGUgcmVzcGVjdGl2ZSBjb25maWd1cmF0aW9uIHZhbHVlcy5cbiAgICAgICAgICovXG4gICAgICAgIGRpY3RGaWxlVG9vQmlnOiBcIkZpbGUgaXMgdG9vIGJpZyAoe3tmaWxlc2l6ZX19TWlCKS4gTWF4IGZpbGVzaXplOiB7e21heEZpbGVzaXplfX1NaUIuXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIHRoZSBmaWxlIGRvZXNuJ3QgbWF0Y2ggdGhlIGZpbGUgdHlwZS5cbiAgICAgICAgICovXG4gICAgICAgIGRpY3RJbnZhbGlkRmlsZVR5cGU6IFwiWW91IGNhbid0IHVwbG9hZCBmaWxlcyBvZiB0aGlzIHR5cGUuXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIHRoZSBzZXJ2ZXIgcmVzcG9uc2Ugd2FzIGludmFsaWQuXG4gICAgICAgICAqIGB7e3N0YXR1c0NvZGV9fWAgd2lsbCBiZSByZXBsYWNlZCB3aXRoIHRoZSBzZXJ2ZXJzIHN0YXR1cyBjb2RlLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdFJlc3BvbnNlRXJyb3I6IFwiU2VydmVyIHJlc3BvbmRlZCB3aXRoIHt7c3RhdHVzQ29kZX19IGNvZGUuXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIGBhZGRSZW1vdmVMaW5rc2AgaXMgdHJ1ZSwgdGhlIHRleHQgdG8gYmUgdXNlZCBmb3IgdGhlIGNhbmNlbCB1cGxvYWQgbGluay5cbiAgICAgICAgICovXG4gICAgICAgIGRpY3RDYW5jZWxVcGxvYWQ6IFwiQ2FuY2VsIHVwbG9hZFwiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgdGV4dCB0aGF0IGlzIGRpc3BsYXllZCBpZiBhbiB1cGxvYWQgd2FzIG1hbnVhbGx5IGNhbmNlbGVkXG4gICAgICAgICAqL1xuICAgICAgICBkaWN0VXBsb2FkQ2FuY2VsZWQ6IFwiVXBsb2FkIGNhbmNlbGVkLlwiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBgYWRkUmVtb3ZlTGlua3NgIGlzIHRydWUsIHRoZSB0ZXh0IHRvIGJlIHVzZWQgZm9yIGNvbmZpcm1hdGlvbiB3aGVuIGNhbmNlbGxpbmcgdXBsb2FkLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdENhbmNlbFVwbG9hZENvbmZpcm1hdGlvbjogXCJBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gY2FuY2VsIHRoaXMgdXBsb2FkP1wiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBJZiBgYWRkUmVtb3ZlTGlua3NgIGlzIHRydWUsIHRoZSB0ZXh0IHRvIGJlIHVzZWQgdG8gcmVtb3ZlIGEgZmlsZS5cbiAgICAgICAgICovXG4gICAgICAgIGRpY3RSZW1vdmVGaWxlOiBcIlJlbW92ZSBmaWxlXCIsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIElmIHRoaXMgaXMgbm90IG51bGwsIHRoZW4gdGhlIHVzZXIgd2lsbCBiZSBwcm9tcHRlZCBiZWZvcmUgcmVtb3ZpbmcgYSBmaWxlLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdFJlbW92ZUZpbGVDb25maXJtYXRpb246IG51bGwsXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIERpc3BsYXllZCBpZiBgbWF4RmlsZXNgIGlzIHN0IGFuZCBleGNlZWRlZC5cbiAgICAgICAgICogVGhlIHN0cmluZyBge3ttYXhGaWxlc319YCB3aWxsIGJlIHJlcGxhY2VkIGJ5IHRoZSBjb25maWd1cmF0aW9uIHZhbHVlLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdE1heEZpbGVzRXhjZWVkZWQ6IFwiWW91IGNhbiBub3QgdXBsb2FkIGFueSBtb3JlIGZpbGVzLlwiLFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBBbGxvd3MgeW91IHRvIHRyYW5zbGF0ZSB0aGUgZGlmZmVyZW50IHVuaXRzLiBTdGFydGluZyB3aXRoIGB0YmAgZm9yIHRlcmFieXRlcyBhbmQgZ29pbmcgZG93biB0b1xuICAgICAgICAgKiBgYmAgZm9yIGJ5dGVzLlxuICAgICAgICAgKi9cbiAgICAgICAgZGljdEZpbGVTaXplVW5pdHM6IHtcbiAgICAgICAgICB0YjogXCJUQlwiLFxuICAgICAgICAgIGdiOiBcIkdCXCIsXG4gICAgICAgICAgbWI6IFwiTUJcIixcbiAgICAgICAgICBrYjogXCJLQlwiLFxuICAgICAgICAgIGI6IFwiYlwiXG4gICAgICAgIH0sXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIENhbGxlZCB3aGVuIGRyb3B6b25lIGluaXRpYWxpemVkXG4gICAgICAgICAqIFlvdSBjYW4gYWRkIGV2ZW50IGxpc3RlbmVycyBoZXJlXG4gICAgICAgICAqL1xuICAgICAgICBpbml0OiBmdW5jdGlvbiBpbml0KCkge30sXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIENhbiBiZSBhbiAqKm9iamVjdCoqIG9mIGFkZGl0aW9uYWwgcGFyYW1ldGVycyB0byB0cmFuc2ZlciB0byB0aGUgc2VydmVyLCAqKm9yKiogYSBgRnVuY3Rpb25gXG4gICAgICAgICAqIHRoYXQgZ2V0cyBpbnZva2VkIHdpdGggdGhlIGBmaWxlc2AsIGB4aHJgIGFuZCwgaWYgaXQncyBhIGNodW5rZWQgdXBsb2FkLCBgY2h1bmtgIGFyZ3VtZW50cy4gSW4gY2FzZVxuICAgICAgICAgKiBvZiBhIGZ1bmN0aW9uLCB0aGlzIG5lZWRzIHRvIHJldHVybiBhIG1hcC5cbiAgICAgICAgICpcbiAgICAgICAgICogVGhlIGRlZmF1bHQgaW1wbGVtZW50YXRpb24gZG9lcyBub3RoaW5nIGZvciBub3JtYWwgdXBsb2FkcywgYnV0IGFkZHMgcmVsZXZhbnQgaW5mb3JtYXRpb24gZm9yXG4gICAgICAgICAqIGNodW5rZWQgdXBsb2Fkcy5cbiAgICAgICAgICpcbiAgICAgICAgICogVGhpcyBpcyB0aGUgc2FtZSBhcyBhZGRpbmcgaGlkZGVuIGlucHV0IGZpZWxkcyBpbiB0aGUgZm9ybSBlbGVtZW50LlxuICAgICAgICAgKi9cbiAgICAgICAgcGFyYW1zOiBmdW5jdGlvbiBwYXJhbXMoZmlsZXMsIHhociwgY2h1bmspIHtcbiAgICAgICAgICBpZiAoY2h1bmspIHtcbiAgICAgICAgICAgIHJldHVybiB7XG4gICAgICAgICAgICAgIGR6dXVpZDogY2h1bmsuZmlsZS51cGxvYWQudXVpZCxcbiAgICAgICAgICAgICAgZHpjaHVua2luZGV4OiBjaHVuay5pbmRleCxcbiAgICAgICAgICAgICAgZHp0b3RhbGZpbGVzaXplOiBjaHVuay5maWxlLnNpemUsXG4gICAgICAgICAgICAgIGR6Y2h1bmtzaXplOiB0aGlzLm9wdGlvbnMuY2h1bmtTaXplLFxuICAgICAgICAgICAgICBkenRvdGFsY2h1bmtjb3VudDogY2h1bmsuZmlsZS51cGxvYWQudG90YWxDaHVua0NvdW50LFxuICAgICAgICAgICAgICBkemNodW5rYnl0ZW9mZnNldDogY2h1bmsuaW5kZXggKiB0aGlzLm9wdGlvbnMuY2h1bmtTaXplXG4gICAgICAgICAgICB9O1xuICAgICAgICAgIH1cbiAgICAgICAgfSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogQSBmdW5jdGlvbiB0aGF0IGdldHMgYSBbZmlsZV0oaHR0cHM6Ly9kZXZlbG9wZXIubW96aWxsYS5vcmcvZW4tVVMvZG9jcy9ET00vRmlsZSlcbiAgICAgICAgICogYW5kIGEgYGRvbmVgIGZ1bmN0aW9uIGFzIHBhcmFtZXRlcnMuXG4gICAgICAgICAqXG4gICAgICAgICAqIElmIHRoZSBkb25lIGZ1bmN0aW9uIGlzIGludm9rZWQgd2l0aG91dCBhcmd1bWVudHMsIHRoZSBmaWxlIGlzIFwiYWNjZXB0ZWRcIiBhbmQgd2lsbFxuICAgICAgICAgKiBiZSBwcm9jZXNzZWQuIElmIHlvdSBwYXNzIGFuIGVycm9yIG1lc3NhZ2UsIHRoZSBmaWxlIGlzIHJlamVjdGVkLCBhbmQgdGhlIGVycm9yXG4gICAgICAgICAqIG1lc3NhZ2Ugd2lsbCBiZSBkaXNwbGF5ZWQuXG4gICAgICAgICAqIFRoaXMgZnVuY3Rpb24gd2lsbCBub3QgYmUgY2FsbGVkIGlmIHRoZSBmaWxlIGlzIHRvbyBiaWcgb3IgZG9lc24ndCBtYXRjaCB0aGUgbWltZSB0eXBlcy5cbiAgICAgICAgICovXG4gICAgICAgIGFjY2VwdDogZnVuY3Rpb24gYWNjZXB0KGZpbGUsIGRvbmUpIHtcbiAgICAgICAgICByZXR1cm4gZG9uZSgpO1xuICAgICAgICB9LFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBUaGUgY2FsbGJhY2sgdGhhdCB3aWxsIGJlIGludm9rZWQgd2hlbiBhbGwgY2h1bmtzIGhhdmUgYmVlbiB1cGxvYWRlZCBmb3IgYSBmaWxlLlxuICAgICAgICAgKiBJdCBnZXRzIHRoZSBmaWxlIGZvciB3aGljaCB0aGUgY2h1bmtzIGhhdmUgYmVlbiB1cGxvYWRlZCBhcyB0aGUgZmlyc3QgcGFyYW1ldGVyLFxuICAgICAgICAgKiBhbmQgdGhlIGBkb25lYCBmdW5jdGlvbiBhcyBzZWNvbmQuIGBkb25lKClgIG5lZWRzIHRvIGJlIGludm9rZWQgd2hlbiBldmVyeXRoaW5nXG4gICAgICAgICAqIG5lZWRlZCB0byBmaW5pc2ggdGhlIHVwbG9hZCBwcm9jZXNzIGlzIGRvbmUuXG4gICAgICAgICAqL1xuICAgICAgICBjaHVua3NVcGxvYWRlZDogZnVuY3Rpb24gY2h1bmtzVXBsb2FkZWQoZmlsZSwgZG9uZSkge1xuICAgICAgICAgIGRvbmUoKTtcbiAgICAgICAgfSxcblxuICAgICAgICAvKipcbiAgICAgICAgICogR2V0cyBjYWxsZWQgd2hlbiB0aGUgYnJvd3NlciBpcyBub3Qgc3VwcG9ydGVkLlxuICAgICAgICAgKiBUaGUgZGVmYXVsdCBpbXBsZW1lbnRhdGlvbiBzaG93cyB0aGUgZmFsbGJhY2sgaW5wdXQgZmllbGQgYW5kIGFkZHNcbiAgICAgICAgICogYSB0ZXh0LlxuICAgICAgICAgKi9cbiAgICAgICAgZmFsbGJhY2s6IGZ1bmN0aW9uIGZhbGxiYWNrKCkge1xuICAgICAgICAgIC8vIFRoaXMgY29kZSBzaG91bGQgcGFzcyBpbiBJRTcuLi4gOihcbiAgICAgICAgICB2YXIgbWVzc2FnZUVsZW1lbnQ7XG4gICAgICAgICAgdGhpcy5lbGVtZW50LmNsYXNzTmFtZSA9IFwiXCIuY29uY2F0KHRoaXMuZWxlbWVudC5jbGFzc05hbWUsIFwiIGR6LWJyb3dzZXItbm90LXN1cHBvcnRlZFwiKTtcblxuICAgICAgICAgIHZhciBfaXRlcmF0b3IyID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIodGhpcy5lbGVtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpKSxcbiAgICAgICAgICAgICAgX3N0ZXAyO1xuXG4gICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgIGZvciAoX2l0ZXJhdG9yMi5zKCk7ICEoX3N0ZXAyID0gX2l0ZXJhdG9yMi5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgICAgIHZhciBjaGlsZCA9IF9zdGVwMi52YWx1ZTtcblxuICAgICAgICAgICAgICBpZiAoLyhefCApZHotbWVzc2FnZSgkfCApLy50ZXN0KGNoaWxkLmNsYXNzTmFtZSkpIHtcbiAgICAgICAgICAgICAgICBtZXNzYWdlRWxlbWVudCA9IGNoaWxkO1xuICAgICAgICAgICAgICAgIGNoaWxkLmNsYXNzTmFtZSA9IFwiZHotbWVzc2FnZVwiOyAvLyBSZW1vdmVzIHRoZSAnZHotZGVmYXVsdCcgY2xhc3NcblxuICAgICAgICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgICBfaXRlcmF0b3IyLmUoZXJyKTtcbiAgICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgICAgX2l0ZXJhdG9yMi5mKCk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgaWYgKCFtZXNzYWdlRWxlbWVudCkge1xuICAgICAgICAgICAgbWVzc2FnZUVsZW1lbnQgPSBEcm9wem9uZS5jcmVhdGVFbGVtZW50KFwiPGRpdiBjbGFzcz1cXFwiZHotbWVzc2FnZVxcXCI+PHNwYW4+PC9zcGFuPjwvZGl2PlwiKTtcbiAgICAgICAgICAgIHRoaXMuZWxlbWVudC5hcHBlbmRDaGlsZChtZXNzYWdlRWxlbWVudCk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgdmFyIHNwYW4gPSBtZXNzYWdlRWxlbWVudC5nZXRFbGVtZW50c0J5VGFnTmFtZShcInNwYW5cIilbMF07XG5cbiAgICAgICAgICBpZiAoc3Bhbikge1xuICAgICAgICAgICAgaWYgKHNwYW4udGV4dENvbnRlbnQgIT0gbnVsbCkge1xuICAgICAgICAgICAgICBzcGFuLnRleHRDb250ZW50ID0gdGhpcy5vcHRpb25zLmRpY3RGYWxsYmFja01lc3NhZ2U7XG4gICAgICAgICAgICB9IGVsc2UgaWYgKHNwYW4uaW5uZXJUZXh0ICE9IG51bGwpIHtcbiAgICAgICAgICAgICAgc3Bhbi5pbm5lclRleHQgPSB0aGlzLm9wdGlvbnMuZGljdEZhbGxiYWNrTWVzc2FnZTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm4gdGhpcy5lbGVtZW50LmFwcGVuZENoaWxkKHRoaXMuZ2V0RmFsbGJhY2tGb3JtKCkpO1xuICAgICAgICB9LFxuXG4gICAgICAgIC8qKlxuICAgICAgICAgKiBHZXRzIGNhbGxlZCB0byBjYWxjdWxhdGUgdGhlIHRodW1ibmFpbCBkaW1lbnNpb25zLlxuICAgICAgICAgKlxuICAgICAgICAgKiBJdCBnZXRzIGBmaWxlYCwgYHdpZHRoYCBhbmQgYGhlaWdodGAgKGJvdGggbWF5IGJlIGBudWxsYCkgYXMgcGFyYW1ldGVycyBhbmQgbXVzdCByZXR1cm4gYW4gb2JqZWN0IGNvbnRhaW5pbmc6XG4gICAgICAgICAqXG4gICAgICAgICAqICAtIGBzcmNXaWR0aGAgJiBgc3JjSGVpZ2h0YCAocmVxdWlyZWQpXG4gICAgICAgICAqICAtIGB0cmdXaWR0aGAgJiBgdHJnSGVpZ2h0YCAocmVxdWlyZWQpXG4gICAgICAgICAqICAtIGBzcmNYYCAmIGBzcmNZYCAob3B0aW9uYWwsIGRlZmF1bHQgYDBgKVxuICAgICAgICAgKiAgLSBgdHJnWGAgJiBgdHJnWWAgKG9wdGlvbmFsLCBkZWZhdWx0IGAwYClcbiAgICAgICAgICpcbiAgICAgICAgICogVGhvc2UgdmFsdWVzIGFyZSBnb2luZyB0byBiZSB1c2VkIGJ5IGBjdHguZHJhd0ltYWdlKClgLlxuICAgICAgICAgKi9cbiAgICAgICAgcmVzaXplOiBmdW5jdGlvbiByZXNpemUoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kKSB7XG4gICAgICAgICAgdmFyIGluZm8gPSB7XG4gICAgICAgICAgICBzcmNYOiAwLFxuICAgICAgICAgICAgc3JjWTogMCxcbiAgICAgICAgICAgIHNyY1dpZHRoOiBmaWxlLndpZHRoLFxuICAgICAgICAgICAgc3JjSGVpZ2h0OiBmaWxlLmhlaWdodFxuICAgICAgICAgIH07XG4gICAgICAgICAgdmFyIHNyY1JhdGlvID0gZmlsZS53aWR0aCAvIGZpbGUuaGVpZ2h0OyAvLyBBdXRvbWF0aWNhbGx5IGNhbGN1bGF0ZSBkaW1lbnNpb25zIGlmIG5vdCBzcGVjaWZpZWRcblxuICAgICAgICAgIGlmICh3aWR0aCA9PSBudWxsICYmIGhlaWdodCA9PSBudWxsKSB7XG4gICAgICAgICAgICB3aWR0aCA9IGluZm8uc3JjV2lkdGg7XG4gICAgICAgICAgICBoZWlnaHQgPSBpbmZvLnNyY0hlaWdodDtcbiAgICAgICAgICB9IGVsc2UgaWYgKHdpZHRoID09IG51bGwpIHtcbiAgICAgICAgICAgIHdpZHRoID0gaGVpZ2h0ICogc3JjUmF0aW87XG4gICAgICAgICAgfSBlbHNlIGlmIChoZWlnaHQgPT0gbnVsbCkge1xuICAgICAgICAgICAgaGVpZ2h0ID0gd2lkdGggLyBzcmNSYXRpbztcbiAgICAgICAgICB9IC8vIE1ha2Ugc3VyZSBpbWFnZXMgYXJlbid0IHVwc2NhbGVkXG5cblxuICAgICAgICAgIHdpZHRoID0gTWF0aC5taW4od2lkdGgsIGluZm8uc3JjV2lkdGgpO1xuICAgICAgICAgIGhlaWdodCA9IE1hdGgubWluKGhlaWdodCwgaW5mby5zcmNIZWlnaHQpO1xuICAgICAgICAgIHZhciB0cmdSYXRpbyA9IHdpZHRoIC8gaGVpZ2h0O1xuXG4gICAgICAgICAgaWYgKGluZm8uc3JjV2lkdGggPiB3aWR0aCB8fCBpbmZvLnNyY0hlaWdodCA+IGhlaWdodCkge1xuICAgICAgICAgICAgLy8gSW1hZ2UgaXMgYmlnZ2VyIGFuZCBuZWVkcyByZXNjYWxpbmdcbiAgICAgICAgICAgIGlmIChyZXNpemVNZXRob2QgPT09ICdjcm9wJykge1xuICAgICAgICAgICAgICBpZiAoc3JjUmF0aW8gPiB0cmdSYXRpbykge1xuICAgICAgICAgICAgICAgIGluZm8uc3JjSGVpZ2h0ID0gZmlsZS5oZWlnaHQ7XG4gICAgICAgICAgICAgICAgaW5mby5zcmNXaWR0aCA9IGluZm8uc3JjSGVpZ2h0ICogdHJnUmF0aW87XG4gICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgaW5mby5zcmNXaWR0aCA9IGZpbGUud2lkdGg7XG4gICAgICAgICAgICAgICAgaW5mby5zcmNIZWlnaHQgPSBpbmZvLnNyY1dpZHRoIC8gdHJnUmF0aW87XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSBpZiAocmVzaXplTWV0aG9kID09PSAnY29udGFpbicpIHtcbiAgICAgICAgICAgICAgLy8gTWV0aG9kICdjb250YWluJ1xuICAgICAgICAgICAgICBpZiAoc3JjUmF0aW8gPiB0cmdSYXRpbykge1xuICAgICAgICAgICAgICAgIGhlaWdodCA9IHdpZHRoIC8gc3JjUmF0aW87XG4gICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgd2lkdGggPSBoZWlnaHQgKiBzcmNSYXRpbztcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKFwiVW5rbm93biByZXNpemVNZXRob2QgJ1wiLmNvbmNhdChyZXNpemVNZXRob2QsIFwiJ1wiKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgaW5mby5zcmNYID0gKGZpbGUud2lkdGggLSBpbmZvLnNyY1dpZHRoKSAvIDI7XG4gICAgICAgICAgaW5mby5zcmNZID0gKGZpbGUuaGVpZ2h0IC0gaW5mby5zcmNIZWlnaHQpIC8gMjtcbiAgICAgICAgICBpbmZvLnRyZ1dpZHRoID0gd2lkdGg7XG4gICAgICAgICAgaW5mby50cmdIZWlnaHQgPSBoZWlnaHQ7XG4gICAgICAgICAgcmV0dXJuIGluZm87XG4gICAgICAgIH0sXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIENhbiBiZSB1c2VkIHRvIHRyYW5zZm9ybSB0aGUgZmlsZSAoZm9yIGV4YW1wbGUsIHJlc2l6ZSBhbiBpbWFnZSBpZiBuZWNlc3NhcnkpLlxuICAgICAgICAgKlxuICAgICAgICAgKiBUaGUgZGVmYXVsdCBpbXBsZW1lbnRhdGlvbiB1c2VzIGByZXNpemVXaWR0aGAgYW5kIGByZXNpemVIZWlnaHRgIChpZiBwcm92aWRlZCkgYW5kIHJlc2l6ZXNcbiAgICAgICAgICogaW1hZ2VzIGFjY29yZGluZyB0byB0aG9zZSBkaW1lbnNpb25zLlxuICAgICAgICAgKlxuICAgICAgICAgKiBHZXRzIHRoZSBgZmlsZWAgYXMgdGhlIGZpcnN0IHBhcmFtZXRlciwgYW5kIGEgYGRvbmUoKWAgZnVuY3Rpb24gYXMgdGhlIHNlY29uZCwgdGhhdCBuZWVkc1xuICAgICAgICAgKiB0byBiZSBpbnZva2VkIHdpdGggdGhlIGZpbGUgd2hlbiB0aGUgdHJhbnNmb3JtYXRpb24gaXMgZG9uZS5cbiAgICAgICAgICovXG4gICAgICAgIHRyYW5zZm9ybUZpbGU6IGZ1bmN0aW9uIHRyYW5zZm9ybUZpbGUoZmlsZSwgZG9uZSkge1xuICAgICAgICAgIGlmICgodGhpcy5vcHRpb25zLnJlc2l6ZVdpZHRoIHx8IHRoaXMub3B0aW9ucy5yZXNpemVIZWlnaHQpICYmIGZpbGUudHlwZS5tYXRjaCgvaW1hZ2UuKi8pKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5yZXNpemVJbWFnZShmaWxlLCB0aGlzLm9wdGlvbnMucmVzaXplV2lkdGgsIHRoaXMub3B0aW9ucy5yZXNpemVIZWlnaHQsIHRoaXMub3B0aW9ucy5yZXNpemVNZXRob2QsIGRvbmUpO1xuICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICByZXR1cm4gZG9uZShmaWxlKTtcbiAgICAgICAgICB9XG4gICAgICAgIH0sXG5cbiAgICAgICAgLyoqXG4gICAgICAgICAqIEEgc3RyaW5nIHRoYXQgY29udGFpbnMgdGhlIHRlbXBsYXRlIHVzZWQgZm9yIGVhY2ggZHJvcHBlZFxuICAgICAgICAgKiBmaWxlLiBDaGFuZ2UgaXQgdG8gZnVsZmlsbCB5b3VyIG5lZWRzIGJ1dCBtYWtlIHN1cmUgdG8gcHJvcGVybHlcbiAgICAgICAgICogcHJvdmlkZSBhbGwgZWxlbWVudHMuXG4gICAgICAgICAqXG4gICAgICAgICAqIElmIHlvdSB3YW50IHRvIHVzZSBhbiBhY3R1YWwgSFRNTCBlbGVtZW50IGluc3RlYWQgb2YgcHJvdmlkaW5nIGEgU3RyaW5nXG4gICAgICAgICAqIGFzIGEgY29uZmlnIG9wdGlvbiwgeW91IGNvdWxkIGNyZWF0ZSBhIGRpdiB3aXRoIHRoZSBpZCBgdHBsYCxcbiAgICAgICAgICogcHV0IHRoZSB0ZW1wbGF0ZSBpbnNpZGUgaXQgYW5kIHByb3ZpZGUgdGhlIGVsZW1lbnQgbGlrZSB0aGlzOlxuICAgICAgICAgKlxuICAgICAgICAgKiAgICAgZG9jdW1lbnRcbiAgICAgICAgICogICAgICAgLnF1ZXJ5U2VsZWN0b3IoJyN0cGwnKVxuICAgICAgICAgKiAgICAgICAuaW5uZXJIVE1MXG4gICAgICAgICAqXG4gICAgICAgICAqL1xuICAgICAgICBwcmV2aWV3VGVtcGxhdGU6IFwiPGRpdiBjbGFzcz1cXFwiZHotcHJldmlldyBkei1maWxlLXByZXZpZXdcXFwiPlxcbiAgPGRpdiBjbGFzcz1cXFwiZHotaW1hZ2VcXFwiPjxpbWcgZGF0YS1kei10aHVtYm5haWwgLz48L2Rpdj5cXG4gIDxkaXYgY2xhc3M9XFxcImR6LWRldGFpbHNcXFwiPlxcbiAgICA8ZGl2IGNsYXNzPVxcXCJkei1zaXplXFxcIj48c3BhbiBkYXRhLWR6LXNpemU+PC9zcGFuPjwvZGl2PlxcbiAgICA8ZGl2IGNsYXNzPVxcXCJkei1maWxlbmFtZVxcXCI+PHNwYW4gZGF0YS1kei1uYW1lPjwvc3Bhbj48L2Rpdj5cXG4gIDwvZGl2PlxcbiAgPGRpdiBjbGFzcz1cXFwiZHotcHJvZ3Jlc3NcXFwiPjxzcGFuIGNsYXNzPVxcXCJkei11cGxvYWRcXFwiIGRhdGEtZHotdXBsb2FkcHJvZ3Jlc3M+PC9zcGFuPjwvZGl2PlxcbiAgPGRpdiBjbGFzcz1cXFwiZHotZXJyb3ItbWVzc2FnZVxcXCI+PHNwYW4gZGF0YS1kei1lcnJvcm1lc3NhZ2U+PC9zcGFuPjwvZGl2PlxcbiAgPGRpdiBjbGFzcz1cXFwiZHotc3VjY2Vzcy1tYXJrXFxcIj5cXG4gICAgPHN2ZyB3aWR0aD1cXFwiNTRweFxcXCIgaGVpZ2h0PVxcXCI1NHB4XFxcIiB2aWV3Qm94PVxcXCIwIDAgNTQgNTRcXFwiIHZlcnNpb249XFxcIjEuMVxcXCIgeG1sbnM9XFxcImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXFxcIiB4bWxuczp4bGluaz1cXFwiaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGlua1xcXCI+XFxuICAgICAgPHRpdGxlPkNoZWNrPC90aXRsZT5cXG4gICAgICA8ZyBzdHJva2U9XFxcIm5vbmVcXFwiIHN0cm9rZS13aWR0aD1cXFwiMVxcXCIgZmlsbD1cXFwibm9uZVxcXCIgZmlsbC1ydWxlPVxcXCJldmVub2RkXFxcIj5cXG4gICAgICAgIDxwYXRoIGQ9XFxcIk0yMy41LDMxLjg0MzE0NTggTDE3LjU4NTI0MTksMjUuOTI4Mzg3NyBDMTYuMDI0ODI1MywyNC4zNjc5NzExIDEzLjQ5MTAyOTQsMjQuMzY2ODM1IDExLjkyODkzMjIsMjUuOTI4OTMyMiBDMTAuMzcwMDEzNiwyNy40ODc4NTA4IDEwLjM2NjU5MTIsMzAuMDIzNDQ1NSAxMS45MjgzODc3LDMxLjU4NTI0MTkgTDIwLjQxNDc1ODEsNDAuMDcxNjEyMyBDMjAuNTEzMzk5OSw0MC4xNzAyNTQxIDIwLjYxNTkzMTUsNDAuMjYyNjY0OSAyMC43MjE4NjE1LDQwLjM0ODg0MzUgQzIyLjI4MzU2NjksNDEuODcyNTY1MSAyNC43OTQyMzQsNDEuODYyNjIwMiAyNi4zNDYxNTY0LDQwLjMxMDY5NzggTDQzLjMxMDY5NzgsMjMuMzQ2MTU2NCBDNDQuODc3MTAyMSwyMS43Nzk3NTIxIDQ0Ljg3NTgwNTcsMTkuMjQ4Mzg4NyA0My4zMTM3MDg1LDE3LjY4NjI5MTUgQzQxLjc1NDc4OTksMTYuMTI3MzcyOSAzOS4yMTc2MDM1LDE2LjEyNTU0MjIgMzcuNjUzODQzNiwxNy42ODkzMDIyIEwyMy41LDMxLjg0MzE0NTggWiBNMjcsNTMgQzQxLjM1OTQwMzUsNTMgNTMsNDEuMzU5NDAzNSA1MywyNyBDNTMsMTIuNjQwNTk2NSA0MS4zNTk0MDM1LDEgMjcsMSBDMTIuNjQwNTk2NSwxIDEsMTIuNjQwNTk2NSAxLDI3IEMxLDQxLjM1OTQwMzUgMTIuNjQwNTk2NSw1MyAyNyw1MyBaXFxcIiBzdHJva2Utb3BhY2l0eT1cXFwiMC4xOTg3OTQxNThcXFwiIHN0cm9rZT1cXFwiIzc0NzQ3NFxcXCIgZmlsbC1vcGFjaXR5PVxcXCIwLjgxNjUxOTQ3NVxcXCIgZmlsbD1cXFwiI0ZGRkZGRlxcXCI+PC9wYXRoPlxcbiAgICAgIDwvZz5cXG4gICAgPC9zdmc+XFxuICA8L2Rpdj5cXG4gIDxkaXYgY2xhc3M9XFxcImR6LWVycm9yLW1hcmtcXFwiPlxcbiAgICA8c3ZnIHdpZHRoPVxcXCI1NHB4XFxcIiBoZWlnaHQ9XFxcIjU0cHhcXFwiIHZpZXdCb3g9XFxcIjAgMCA1NCA1NFxcXCIgdmVyc2lvbj1cXFwiMS4xXFxcIiB4bWxucz1cXFwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcXFwiIHhtbG5zOnhsaW5rPVxcXCJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rXFxcIj5cXG4gICAgICA8dGl0bGU+RXJyb3I8L3RpdGxlPlxcbiAgICAgIDxnIHN0cm9rZT1cXFwibm9uZVxcXCIgc3Ryb2tlLXdpZHRoPVxcXCIxXFxcIiBmaWxsPVxcXCJub25lXFxcIiBmaWxsLXJ1bGU9XFxcImV2ZW5vZGRcXFwiPlxcbiAgICAgICAgPGcgc3Ryb2tlPVxcXCIjNzQ3NDc0XFxcIiBzdHJva2Utb3BhY2l0eT1cXFwiMC4xOTg3OTQxNThcXFwiIGZpbGw9XFxcIiNGRkZGRkZcXFwiIGZpbGwtb3BhY2l0eT1cXFwiMC44MTY1MTk0NzVcXFwiPlxcbiAgICAgICAgICA8cGF0aCBkPVxcXCJNMzIuNjU2ODU0MiwyOSBMMzguMzEwNjk3OCwyMy4zNDYxNTY0IEMzOS44NzcxMDIxLDIxLjc3OTc1MjEgMzkuODc1ODA1NywxOS4yNDgzODg3IDM4LjMxMzcwODUsMTcuNjg2MjkxNSBDMzYuNzU0Nzg5OSwxNi4xMjczNzI5IDM0LjIxNzYwMzUsMTYuMTI1NTQyMiAzMi42NTM4NDM2LDE3LjY4OTMwMjIgTDI3LDIzLjM0MzE0NTggTDIxLjM0NjE1NjQsMTcuNjg5MzAyMiBDMTkuNzgyMzk2NSwxNi4xMjU1NDIyIDE3LjI0NTIxMDEsMTYuMTI3MzcyOSAxNS42ODYyOTE1LDE3LjY4NjI5MTUgQzE0LjEyNDE5NDMsMTkuMjQ4Mzg4NyAxNC4xMjI4OTc5LDIxLjc3OTc1MjEgMTUuNjg5MzAyMiwyMy4zNDYxNTY0IEwyMS4zNDMxNDU4LDI5IEwxNS42ODkzMDIyLDM0LjY1Mzg0MzYgQzE0LjEyMjg5NzksMzYuMjIwMjQ3OSAxNC4xMjQxOTQzLDM4Ljc1MTYxMTMgMTUuNjg2MjkxNSw0MC4zMTM3MDg1IEMxNy4yNDUyMTAxLDQxLjg3MjYyNzEgMTkuNzgyMzk2NSw0MS44NzQ0NTc4IDIxLjM0NjE1NjQsNDAuMzEwNjk3OCBMMjcsMzQuNjU2ODU0MiBMMzIuNjUzODQzNiw0MC4zMTA2OTc4IEMzNC4yMTc2MDM1LDQxLjg3NDQ1NzggMzYuNzU0Nzg5OSw0MS44NzI2MjcxIDM4LjMxMzcwODUsNDAuMzEzNzA4NSBDMzkuODc1ODA1NywzOC43NTE2MTEzIDM5Ljg3NzEwMjEsMzYuMjIwMjQ3OSAzOC4zMTA2OTc4LDM0LjY1Mzg0MzYgTDMyLjY1Njg1NDIsMjkgWiBNMjcsNTMgQzQxLjM1OTQwMzUsNTMgNTMsNDEuMzU5NDAzNSA1MywyNyBDNTMsMTIuNjQwNTk2NSA0MS4zNTk0MDM1LDEgMjcsMSBDMTIuNjQwNTk2NSwxIDEsMTIuNjQwNTk2NSAxLDI3IEMxLDQxLjM1OTQwMzUgMTIuNjQwNTk2NSw1MyAyNyw1MyBaXFxcIj48L3BhdGg+XFxuICAgICAgICA8L2c+XFxuICAgICAgPC9nPlxcbiAgICA8L3N2Zz5cXG4gIDwvZGl2PlxcbjwvZGl2PlwiLFxuICAgICAgICAvLyBFTkQgT1BUSU9OU1xuICAgICAgICAvLyAoUmVxdWlyZWQgYnkgdGhlIGRyb3B6b25lIGRvY3VtZW50YXRpb24gcGFyc2VyKVxuXG4gICAgICAgIC8qXG4gICAgICAgICBUaG9zZSBmdW5jdGlvbnMgcmVnaXN0ZXIgdGhlbXNlbHZlcyB0byB0aGUgZXZlbnRzIG9uIGluaXQgYW5kIGhhbmRsZSBhbGxcbiAgICAgICAgIHRoZSB1c2VyIGludGVyZmFjZSBzcGVjaWZpYyBzdHVmZi4gT3ZlcndyaXRpbmcgdGhlbSB3b24ndCBicmVhayB0aGUgdXBsb2FkXG4gICAgICAgICBidXQgY2FuIGJyZWFrIHRoZSB3YXkgaXQncyBkaXNwbGF5ZWQuXG4gICAgICAgICBZb3UgY2FuIG92ZXJ3cml0ZSB0aGVtIGlmIHlvdSBkb24ndCBsaWtlIHRoZSBkZWZhdWx0IGJlaGF2aW9yLiBJZiB5b3UganVzdFxuICAgICAgICAgd2FudCB0byBhZGQgYW4gYWRkaXRpb25hbCBldmVudCBoYW5kbGVyLCByZWdpc3RlciBpdCBvbiB0aGUgZHJvcHpvbmUgb2JqZWN0XG4gICAgICAgICBhbmQgZG9uJ3Qgb3ZlcndyaXRlIHRob3NlIG9wdGlvbnMuXG4gICAgICAgICAqL1xuICAgICAgICAvLyBUaG9zZSBhcmUgc2VsZiBleHBsYW5hdG9yeSBhbmQgc2ltcGx5IGNvbmNlcm4gdGhlIERyYWduRHJvcC5cbiAgICAgICAgZHJvcDogZnVuY3Rpb24gZHJvcChlKSB7XG4gICAgICAgICAgcmV0dXJuIHRoaXMuZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKFwiZHotZHJhZy1ob3ZlclwiKTtcbiAgICAgICAgfSxcbiAgICAgICAgZHJhZ3N0YXJ0OiBmdW5jdGlvbiBkcmFnc3RhcnQoZSkge30sXG4gICAgICAgIGRyYWdlbmQ6IGZ1bmN0aW9uIGRyYWdlbmQoZSkge1xuICAgICAgICAgIHJldHVybiB0aGlzLmVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShcImR6LWRyYWctaG92ZXJcIik7XG4gICAgICAgIH0sXG4gICAgICAgIGRyYWdlbnRlcjogZnVuY3Rpb24gZHJhZ2VudGVyKGUpIHtcbiAgICAgICAgICByZXR1cm4gdGhpcy5lbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJkei1kcmFnLWhvdmVyXCIpO1xuICAgICAgICB9LFxuICAgICAgICBkcmFnb3ZlcjogZnVuY3Rpb24gZHJhZ292ZXIoZSkge1xuICAgICAgICAgIHJldHVybiB0aGlzLmVsZW1lbnQuY2xhc3NMaXN0LmFkZChcImR6LWRyYWctaG92ZXJcIik7XG4gICAgICAgIH0sXG4gICAgICAgIGRyYWdsZWF2ZTogZnVuY3Rpb24gZHJhZ2xlYXZlKGUpIHtcbiAgICAgICAgICByZXR1cm4gdGhpcy5lbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoXCJkei1kcmFnLWhvdmVyXCIpO1xuICAgICAgICB9LFxuICAgICAgICBwYXN0ZTogZnVuY3Rpb24gcGFzdGUoZSkge30sXG4gICAgICAgIC8vIENhbGxlZCB3aGVuZXZlciB0aGVyZSBhcmUgbm8gZmlsZXMgbGVmdCBpbiB0aGUgZHJvcHpvbmUgYW55bW9yZSwgYW5kIHRoZVxuICAgICAgICAvLyBkcm9wem9uZSBzaG91bGQgYmUgZGlzcGxheWVkIGFzIGlmIGluIHRoZSBpbml0aWFsIHN0YXRlLlxuICAgICAgICByZXNldDogZnVuY3Rpb24gcmVzZXQoKSB7XG4gICAgICAgICAgcmV0dXJuIHRoaXMuZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKFwiZHotc3RhcnRlZFwiKTtcbiAgICAgICAgfSxcbiAgICAgICAgLy8gQ2FsbGVkIHdoZW4gYSBmaWxlIGlzIGFkZGVkIHRvIHRoZSBxdWV1ZVxuICAgICAgICAvLyBSZWNlaXZlcyBgZmlsZWBcbiAgICAgICAgYWRkZWRmaWxlOiBmdW5jdGlvbiBhZGRlZGZpbGUoZmlsZSkge1xuICAgICAgICAgIHZhciBfdGhpczIgPSB0aGlzO1xuXG4gICAgICAgICAgaWYgKHRoaXMuZWxlbWVudCA9PT0gdGhpcy5wcmV2aWV3c0NvbnRhaW5lcikge1xuICAgICAgICAgICAgdGhpcy5lbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJkei1zdGFydGVkXCIpO1xuICAgICAgICAgIH1cblxuICAgICAgICAgIGlmICh0aGlzLnByZXZpZXdzQ29udGFpbmVyKSB7XG4gICAgICAgICAgICBmaWxlLnByZXZpZXdFbGVtZW50ID0gRHJvcHpvbmUuY3JlYXRlRWxlbWVudCh0aGlzLm9wdGlvbnMucHJldmlld1RlbXBsYXRlLnRyaW0oKSk7XG4gICAgICAgICAgICBmaWxlLnByZXZpZXdUZW1wbGF0ZSA9IGZpbGUucHJldmlld0VsZW1lbnQ7IC8vIEJhY2t3YXJkcyBjb21wYXRpYmlsaXR5XG5cbiAgICAgICAgICAgIHRoaXMucHJldmlld3NDb250YWluZXIuYXBwZW5kQ2hpbGQoZmlsZS5wcmV2aWV3RWxlbWVudCk7XG5cbiAgICAgICAgICAgIHZhciBfaXRlcmF0b3IzID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZS5wcmV2aWV3RWxlbWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiW2RhdGEtZHotbmFtZV1cIikpLFxuICAgICAgICAgICAgICAgIF9zdGVwMztcblxuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgZm9yIChfaXRlcmF0b3IzLnMoKTsgIShfc3RlcDMgPSBfaXRlcmF0b3IzLm4oKSkuZG9uZTspIHtcbiAgICAgICAgICAgICAgICB2YXIgbm9kZSA9IF9zdGVwMy52YWx1ZTtcbiAgICAgICAgICAgICAgICBub2RlLnRleHRDb250ZW50ID0gZmlsZS5uYW1lO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgICAgX2l0ZXJhdG9yMy5lKGVycik7XG4gICAgICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgICAgICBfaXRlcmF0b3IzLmYoKTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgdmFyIF9pdGVyYXRvcjQgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihmaWxlLnByZXZpZXdFbGVtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJbZGF0YS1kei1zaXplXVwiKSksXG4gICAgICAgICAgICAgICAgX3N0ZXA0O1xuXG4gICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICBmb3IgKF9pdGVyYXRvcjQucygpOyAhKF9zdGVwNCA9IF9pdGVyYXRvcjQubigpKS5kb25lOykge1xuICAgICAgICAgICAgICAgIG5vZGUgPSBfc3RlcDQudmFsdWU7XG4gICAgICAgICAgICAgICAgbm9kZS5pbm5lckhUTUwgPSB0aGlzLmZpbGVzaXplKGZpbGUuc2l6ZSk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICBfaXRlcmF0b3I0LmUoZXJyKTtcbiAgICAgICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgICAgIF9pdGVyYXRvcjQuZigpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBpZiAodGhpcy5vcHRpb25zLmFkZFJlbW92ZUxpbmtzKSB7XG4gICAgICAgICAgICAgIGZpbGUuX3JlbW92ZUxpbmsgPSBEcm9wem9uZS5jcmVhdGVFbGVtZW50KFwiPGEgY2xhc3M9XFxcImR6LXJlbW92ZVxcXCIgaHJlZj1cXFwiamF2YXNjcmlwdDp1bmRlZmluZWQ7XFxcIiBkYXRhLWR6LXJlbW92ZT5cIi5jb25jYXQodGhpcy5vcHRpb25zLmRpY3RSZW1vdmVGaWxlLCBcIjwvYT5cIikpO1xuICAgICAgICAgICAgICBmaWxlLnByZXZpZXdFbGVtZW50LmFwcGVuZENoaWxkKGZpbGUuX3JlbW92ZUxpbmspO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICB2YXIgcmVtb3ZlRmlsZUV2ZW50ID0gZnVuY3Rpb24gcmVtb3ZlRmlsZUV2ZW50KGUpIHtcbiAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuXG4gICAgICAgICAgICAgIGlmIChmaWxlLnN0YXR1cyA9PT0gRHJvcHpvbmUuVVBMT0FESU5HKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIERyb3B6b25lLmNvbmZpcm0oX3RoaXMyLm9wdGlvbnMuZGljdENhbmNlbFVwbG9hZENvbmZpcm1hdGlvbiwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgcmV0dXJuIF90aGlzMi5yZW1vdmVGaWxlKGZpbGUpO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIGlmIChfdGhpczIub3B0aW9ucy5kaWN0UmVtb3ZlRmlsZUNvbmZpcm1hdGlvbikge1xuICAgICAgICAgICAgICAgICAgcmV0dXJuIERyb3B6b25lLmNvbmZpcm0oX3RoaXMyLm9wdGlvbnMuZGljdFJlbW92ZUZpbGVDb25maXJtYXRpb24sIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIF90aGlzMi5yZW1vdmVGaWxlKGZpbGUpO1xuICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgIHJldHVybiBfdGhpczIucmVtb3ZlRmlsZShmaWxlKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH07XG5cbiAgICAgICAgICAgIHZhciBfaXRlcmF0b3I1ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZS5wcmV2aWV3RWxlbWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiW2RhdGEtZHotcmVtb3ZlXVwiKSksXG4gICAgICAgICAgICAgICAgX3N0ZXA1O1xuXG4gICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICBmb3IgKF9pdGVyYXRvcjUucygpOyAhKF9zdGVwNSA9IF9pdGVyYXRvcjUubigpKS5kb25lOykge1xuICAgICAgICAgICAgICAgIHZhciByZW1vdmVMaW5rID0gX3N0ZXA1LnZhbHVlO1xuICAgICAgICAgICAgICAgIHJlbW92ZUxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIHJlbW92ZUZpbGVFdmVudCk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICBfaXRlcmF0b3I1LmUoZXJyKTtcbiAgICAgICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgICAgIF9pdGVyYXRvcjUuZigpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgLy8gQ2FsbGVkIHdoZW5ldmVyIGEgZmlsZSBpcyByZW1vdmVkLlxuICAgICAgICByZW1vdmVkZmlsZTogZnVuY3Rpb24gcmVtb3ZlZGZpbGUoZmlsZSkge1xuICAgICAgICAgIGlmIChmaWxlLnByZXZpZXdFbGVtZW50ICE9IG51bGwgJiYgZmlsZS5wcmV2aWV3RWxlbWVudC5wYXJlbnROb2RlICE9IG51bGwpIHtcbiAgICAgICAgICAgIGZpbGUucHJldmlld0VsZW1lbnQucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChmaWxlLnByZXZpZXdFbGVtZW50KTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm4gdGhpcy5fdXBkYXRlTWF4RmlsZXNSZWFjaGVkQ2xhc3MoKTtcbiAgICAgICAgfSxcbiAgICAgICAgLy8gQ2FsbGVkIHdoZW4gYSB0aHVtYm5haWwgaGFzIGJlZW4gZ2VuZXJhdGVkXG4gICAgICAgIC8vIFJlY2VpdmVzIGBmaWxlYCBhbmQgYGRhdGFVcmxgXG4gICAgICAgIHRodW1ibmFpbDogZnVuY3Rpb24gdGh1bWJuYWlsKGZpbGUsIGRhdGFVcmwpIHtcbiAgICAgICAgICBpZiAoZmlsZS5wcmV2aWV3RWxlbWVudCkge1xuICAgICAgICAgICAgZmlsZS5wcmV2aWV3RWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKFwiZHotZmlsZS1wcmV2aWV3XCIpO1xuXG4gICAgICAgICAgICB2YXIgX2l0ZXJhdG9yNiA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGZpbGUucHJldmlld0VsZW1lbnQucXVlcnlTZWxlY3RvckFsbChcIltkYXRhLWR6LXRodW1ibmFpbF1cIikpLFxuICAgICAgICAgICAgICAgIF9zdGVwNjtcblxuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgZm9yIChfaXRlcmF0b3I2LnMoKTsgIShfc3RlcDYgPSBfaXRlcmF0b3I2Lm4oKSkuZG9uZTspIHtcbiAgICAgICAgICAgICAgICB2YXIgdGh1bWJuYWlsRWxlbWVudCA9IF9zdGVwNi52YWx1ZTtcbiAgICAgICAgICAgICAgICB0aHVtYm5haWxFbGVtZW50LmFsdCA9IGZpbGUubmFtZTtcbiAgICAgICAgICAgICAgICB0aHVtYm5haWxFbGVtZW50LnNyYyA9IGRhdGFVcmw7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICBfaXRlcmF0b3I2LmUoZXJyKTtcbiAgICAgICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgICAgIF9pdGVyYXRvcjYuZigpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICByZXR1cm4gc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgIHJldHVybiBmaWxlLnByZXZpZXdFbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJkei1pbWFnZS1wcmV2aWV3XCIpO1xuICAgICAgICAgICAgfSwgMSk7XG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICAvLyBDYWxsZWQgd2hlbmV2ZXIgYW4gZXJyb3Igb2NjdXJzXG4gICAgICAgIC8vIFJlY2VpdmVzIGBmaWxlYCBhbmQgYG1lc3NhZ2VgXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbiBlcnJvcihmaWxlLCBtZXNzYWdlKSB7XG4gICAgICAgICAgaWYgKGZpbGUucHJldmlld0VsZW1lbnQpIHtcbiAgICAgICAgICAgIGZpbGUucHJldmlld0VsZW1lbnQuY2xhc3NMaXN0LmFkZChcImR6LWVycm9yXCIpO1xuXG4gICAgICAgICAgICBpZiAodHlwZW9mIG1lc3NhZ2UgIT09IFwic3RyaW5nXCIgJiYgbWVzc2FnZS5lcnJvcikge1xuICAgICAgICAgICAgICBtZXNzYWdlID0gbWVzc2FnZS5lcnJvcjtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgdmFyIF9pdGVyYXRvcjcgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihmaWxlLnByZXZpZXdFbGVtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJbZGF0YS1kei1lcnJvcm1lc3NhZ2VdXCIpKSxcbiAgICAgICAgICAgICAgICBfc3RlcDc7XG5cbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgIGZvciAoX2l0ZXJhdG9yNy5zKCk7ICEoX3N0ZXA3ID0gX2l0ZXJhdG9yNy5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgICAgICAgdmFyIG5vZGUgPSBfc3RlcDcudmFsdWU7XG4gICAgICAgICAgICAgICAgbm9kZS50ZXh0Q29udGVudCA9IG1lc3NhZ2U7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICBfaXRlcmF0b3I3LmUoZXJyKTtcbiAgICAgICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgICAgIF9pdGVyYXRvcjcuZigpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgZXJyb3JtdWx0aXBsZTogZnVuY3Rpb24gZXJyb3JtdWx0aXBsZSgpIHt9LFxuICAgICAgICAvLyBDYWxsZWQgd2hlbiBhIGZpbGUgZ2V0cyBwcm9jZXNzZWQuIFNpbmNlIHRoZXJlIGlzIGEgY3VlLCBub3QgYWxsIGFkZGVkXG4gICAgICAgIC8vIGZpbGVzIGFyZSBwcm9jZXNzZWQgaW1tZWRpYXRlbHkuXG4gICAgICAgIC8vIFJlY2VpdmVzIGBmaWxlYFxuICAgICAgICBwcm9jZXNzaW5nOiBmdW5jdGlvbiBwcm9jZXNzaW5nKGZpbGUpIHtcbiAgICAgICAgICBpZiAoZmlsZS5wcmV2aWV3RWxlbWVudCkge1xuICAgICAgICAgICAgZmlsZS5wcmV2aWV3RWxlbWVudC5jbGFzc0xpc3QuYWRkKFwiZHotcHJvY2Vzc2luZ1wiKTtcblxuICAgICAgICAgICAgaWYgKGZpbGUuX3JlbW92ZUxpbmspIHtcbiAgICAgICAgICAgICAgcmV0dXJuIGZpbGUuX3JlbW92ZUxpbmsuaW5uZXJIVE1MID0gdGhpcy5vcHRpb25zLmRpY3RDYW5jZWxVcGxvYWQ7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBwcm9jZXNzaW5nbXVsdGlwbGU6IGZ1bmN0aW9uIHByb2Nlc3NpbmdtdWx0aXBsZSgpIHt9LFxuICAgICAgICAvLyBDYWxsZWQgd2hlbmV2ZXIgdGhlIHVwbG9hZCBwcm9ncmVzcyBnZXRzIHVwZGF0ZWQuXG4gICAgICAgIC8vIFJlY2VpdmVzIGBmaWxlYCwgYHByb2dyZXNzYCAocGVyY2VudGFnZSAwLTEwMCkgYW5kIGBieXRlc1NlbnRgLlxuICAgICAgICAvLyBUbyBnZXQgdGhlIHRvdGFsIG51bWJlciBvZiBieXRlcyBvZiB0aGUgZmlsZSwgdXNlIGBmaWxlLnNpemVgXG4gICAgICAgIHVwbG9hZHByb2dyZXNzOiBmdW5jdGlvbiB1cGxvYWRwcm9ncmVzcyhmaWxlLCBwcm9ncmVzcywgYnl0ZXNTZW50KSB7XG4gICAgICAgICAgaWYgKGZpbGUucHJldmlld0VsZW1lbnQpIHtcbiAgICAgICAgICAgIHZhciBfaXRlcmF0b3I4ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZS5wcmV2aWV3RWxlbWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiW2RhdGEtZHotdXBsb2FkcHJvZ3Jlc3NdXCIpKSxcbiAgICAgICAgICAgICAgICBfc3RlcDg7XG5cbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgIGZvciAoX2l0ZXJhdG9yOC5zKCk7ICEoX3N0ZXA4ID0gX2l0ZXJhdG9yOC5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgICAgICAgdmFyIG5vZGUgPSBfc3RlcDgudmFsdWU7XG4gICAgICAgICAgICAgICAgbm9kZS5ub2RlTmFtZSA9PT0gJ1BST0dSRVNTJyA/IG5vZGUudmFsdWUgPSBwcm9ncmVzcyA6IG5vZGUuc3R5bGUud2lkdGggPSBcIlwiLmNvbmNhdChwcm9ncmVzcywgXCIlXCIpO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgICAgX2l0ZXJhdG9yOC5lKGVycik7XG4gICAgICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgICAgICBfaXRlcmF0b3I4LmYoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIC8vIENhbGxlZCB3aGVuZXZlciB0aGUgdG90YWwgdXBsb2FkIHByb2dyZXNzIGdldHMgdXBkYXRlZC5cbiAgICAgICAgLy8gQ2FsbGVkIHdpdGggdG90YWxVcGxvYWRQcm9ncmVzcyAoMC0xMDApLCB0b3RhbEJ5dGVzIGFuZCB0b3RhbEJ5dGVzU2VudFxuICAgICAgICB0b3RhbHVwbG9hZHByb2dyZXNzOiBmdW5jdGlvbiB0b3RhbHVwbG9hZHByb2dyZXNzKCkge30sXG4gICAgICAgIC8vIENhbGxlZCBqdXN0IGJlZm9yZSB0aGUgZmlsZSBpcyBzZW50LiBHZXRzIHRoZSBgeGhyYCBvYmplY3QgYXMgc2Vjb25kXG4gICAgICAgIC8vIHBhcmFtZXRlciwgc28geW91IGNhbiBtb2RpZnkgaXQgKGZvciBleGFtcGxlIHRvIGFkZCBhIENTUkYgdG9rZW4pIGFuZCBhXG4gICAgICAgIC8vIGBmb3JtRGF0YWAgb2JqZWN0IHRvIGFkZCBhZGRpdGlvbmFsIGluZm9ybWF0aW9uLlxuICAgICAgICBzZW5kaW5nOiBmdW5jdGlvbiBzZW5kaW5nKCkge30sXG4gICAgICAgIHNlbmRpbmdtdWx0aXBsZTogZnVuY3Rpb24gc2VuZGluZ211bHRpcGxlKCkge30sXG4gICAgICAgIC8vIFdoZW4gdGhlIGNvbXBsZXRlIHVwbG9hZCBpcyBmaW5pc2hlZCBhbmQgc3VjY2Vzc2Z1bFxuICAgICAgICAvLyBSZWNlaXZlcyBgZmlsZWBcbiAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gc3VjY2VzcyhmaWxlKSB7XG4gICAgICAgICAgaWYgKGZpbGUucHJldmlld0VsZW1lbnQpIHtcbiAgICAgICAgICAgIHJldHVybiBmaWxlLnByZXZpZXdFbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJkei1zdWNjZXNzXCIpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgc3VjY2Vzc211bHRpcGxlOiBmdW5jdGlvbiBzdWNjZXNzbXVsdGlwbGUoKSB7fSxcbiAgICAgICAgLy8gV2hlbiB0aGUgdXBsb2FkIGlzIGNhbmNlbGVkLlxuICAgICAgICBjYW5jZWxlZDogZnVuY3Rpb24gY2FuY2VsZWQoZmlsZSkge1xuICAgICAgICAgIHJldHVybiB0aGlzLmVtaXQoXCJlcnJvclwiLCBmaWxlLCB0aGlzLm9wdGlvbnMuZGljdFVwbG9hZENhbmNlbGVkKTtcbiAgICAgICAgfSxcbiAgICAgICAgY2FuY2VsZWRtdWx0aXBsZTogZnVuY3Rpb24gY2FuY2VsZWRtdWx0aXBsZSgpIHt9LFxuICAgICAgICAvLyBXaGVuIHRoZSB1cGxvYWQgaXMgZmluaXNoZWQsIGVpdGhlciB3aXRoIHN1Y2Nlc3Mgb3IgYW4gZXJyb3IuXG4gICAgICAgIC8vIFJlY2VpdmVzIGBmaWxlYFxuICAgICAgICBjb21wbGV0ZTogZnVuY3Rpb24gY29tcGxldGUoZmlsZSkge1xuICAgICAgICAgIGlmIChmaWxlLl9yZW1vdmVMaW5rKSB7XG4gICAgICAgICAgICBmaWxlLl9yZW1vdmVMaW5rLmlubmVySFRNTCA9IHRoaXMub3B0aW9ucy5kaWN0UmVtb3ZlRmlsZTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBpZiAoZmlsZS5wcmV2aWV3RWxlbWVudCkge1xuICAgICAgICAgICAgcmV0dXJuIGZpbGUucHJldmlld0VsZW1lbnQuY2xhc3NMaXN0LmFkZChcImR6LWNvbXBsZXRlXCIpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgY29tcGxldGVtdWx0aXBsZTogZnVuY3Rpb24gY29tcGxldGVtdWx0aXBsZSgpIHt9LFxuICAgICAgICBtYXhmaWxlc2V4Y2VlZGVkOiBmdW5jdGlvbiBtYXhmaWxlc2V4Y2VlZGVkKCkge30sXG4gICAgICAgIG1heGZpbGVzcmVhY2hlZDogZnVuY3Rpb24gbWF4ZmlsZXNyZWFjaGVkKCkge30sXG4gICAgICAgIHF1ZXVlY29tcGxldGU6IGZ1bmN0aW9uIHF1ZXVlY29tcGxldGUoKSB7fSxcbiAgICAgICAgYWRkZWRmaWxlczogZnVuY3Rpb24gYWRkZWRmaWxlcygpIHt9XG4gICAgICB9O1xuICAgICAgdGhpcy5wcm90b3R5cGUuX3RodW1ibmFpbFF1ZXVlID0gW107XG4gICAgICB0aGlzLnByb3RvdHlwZS5fcHJvY2Vzc2luZ1RodW1ibmFpbCA9IGZhbHNlO1xuICAgIH0gLy8gZ2xvYmFsIHV0aWxpdHlcblxuICB9LCB7XG4gICAga2V5OiBcImV4dGVuZFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBleHRlbmQodGFyZ2V0KSB7XG4gICAgICBmb3IgKHZhciBfbGVuMiA9IGFyZ3VtZW50cy5sZW5ndGgsIG9iamVjdHMgPSBuZXcgQXJyYXkoX2xlbjIgPiAxID8gX2xlbjIgLSAxIDogMCksIF9rZXkyID0gMTsgX2tleTIgPCBfbGVuMjsgX2tleTIrKykge1xuICAgICAgICBvYmplY3RzW19rZXkyIC0gMV0gPSBhcmd1bWVudHNbX2tleTJdO1xuICAgICAgfVxuXG4gICAgICBmb3IgKHZhciBfaSA9IDAsIF9vYmplY3RzID0gb2JqZWN0czsgX2kgPCBfb2JqZWN0cy5sZW5ndGg7IF9pKyspIHtcbiAgICAgICAgdmFyIG9iamVjdCA9IF9vYmplY3RzW19pXTtcblxuICAgICAgICBmb3IgKHZhciBrZXkgaW4gb2JqZWN0KSB7XG4gICAgICAgICAgdmFyIHZhbCA9IG9iamVjdFtrZXldO1xuICAgICAgICAgIHRhcmdldFtrZXldID0gdmFsO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0YXJnZXQ7XG4gICAgfVxuICB9XSk7XG5cbiAgZnVuY3Rpb24gRHJvcHpvbmUoZWwsIG9wdGlvbnMpIHtcbiAgICB2YXIgX3RoaXM7XG5cbiAgICBfY2xhc3NDYWxsQ2hlY2sodGhpcywgRHJvcHpvbmUpO1xuXG4gICAgX3RoaXMgPSBfc3VwZXIuY2FsbCh0aGlzKTtcbiAgICB2YXIgZmFsbGJhY2ssIGxlZnQ7XG4gICAgX3RoaXMuZWxlbWVudCA9IGVsOyAvLyBGb3IgYmFja3dhcmRzIGNvbXBhdGliaWxpdHkgc2luY2UgdGhlIHZlcnNpb24gd2FzIGluIHRoZSBwcm90b3R5cGUgcHJldmlvdXNseVxuXG4gICAgX3RoaXMudmVyc2lvbiA9IERyb3B6b25lLnZlcnNpb247XG4gICAgX3RoaXMuZGVmYXVsdE9wdGlvbnMucHJldmlld1RlbXBsYXRlID0gX3RoaXMuZGVmYXVsdE9wdGlvbnMucHJldmlld1RlbXBsYXRlLnJlcGxhY2UoL1xcbiovZywgXCJcIik7XG4gICAgX3RoaXMuY2xpY2thYmxlRWxlbWVudHMgPSBbXTtcbiAgICBfdGhpcy5saXN0ZW5lcnMgPSBbXTtcbiAgICBfdGhpcy5maWxlcyA9IFtdOyAvLyBBbGwgZmlsZXNcblxuICAgIGlmICh0eXBlb2YgX3RoaXMuZWxlbWVudCA9PT0gXCJzdHJpbmdcIikge1xuICAgICAgX3RoaXMuZWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoX3RoaXMuZWxlbWVudCk7XG4gICAgfSAvLyBOb3QgY2hlY2tpbmcgaWYgaW5zdGFuY2Ugb2YgSFRNTEVsZW1lbnQgb3IgRWxlbWVudCBzaW5jZSBJRTkgaXMgZXh0cmVtZWx5IHdlaXJkLlxuXG5cbiAgICBpZiAoIV90aGlzLmVsZW1lbnQgfHwgX3RoaXMuZWxlbWVudC5ub2RlVHlwZSA9PSBudWxsKSB7XG4gICAgICB0aHJvdyBuZXcgRXJyb3IoXCJJbnZhbGlkIGRyb3B6b25lIGVsZW1lbnQuXCIpO1xuICAgIH1cblxuICAgIGlmIChfdGhpcy5lbGVtZW50LmRyb3B6b25lKSB7XG4gICAgICB0aHJvdyBuZXcgRXJyb3IoXCJEcm9wem9uZSBhbHJlYWR5IGF0dGFjaGVkLlwiKTtcbiAgICB9IC8vIE5vdyBhZGQgdGhpcyBkcm9wem9uZSB0byB0aGUgaW5zdGFuY2VzLlxuXG5cbiAgICBEcm9wem9uZS5pbnN0YW5jZXMucHVzaChfYXNzZXJ0VGhpc0luaXRpYWxpemVkKF90aGlzKSk7IC8vIFB1dCB0aGUgZHJvcHpvbmUgaW5zaWRlIHRoZSBlbGVtZW50IGl0c2VsZi5cblxuICAgIF90aGlzLmVsZW1lbnQuZHJvcHpvbmUgPSBfYXNzZXJ0VGhpc0luaXRpYWxpemVkKF90aGlzKTtcbiAgICB2YXIgZWxlbWVudE9wdGlvbnMgPSAobGVmdCA9IERyb3B6b25lLm9wdGlvbnNGb3JFbGVtZW50KF90aGlzLmVsZW1lbnQpKSAhPSBudWxsID8gbGVmdCA6IHt9O1xuICAgIF90aGlzLm9wdGlvbnMgPSBEcm9wem9uZS5leHRlbmQoe30sIF90aGlzLmRlZmF1bHRPcHRpb25zLCBlbGVtZW50T3B0aW9ucywgb3B0aW9ucyAhPSBudWxsID8gb3B0aW9ucyA6IHt9KTsgLy8gSWYgdGhlIGJyb3dzZXIgZmFpbGVkLCBqdXN0IGNhbGwgdGhlIGZhbGxiYWNrIGFuZCBsZWF2ZVxuXG4gICAgaWYgKF90aGlzLm9wdGlvbnMuZm9yY2VGYWxsYmFjayB8fCAhRHJvcHpvbmUuaXNCcm93c2VyU3VwcG9ydGVkKCkpIHtcbiAgICAgIHJldHVybiBfcG9zc2libGVDb25zdHJ1Y3RvclJldHVybihfdGhpcywgX3RoaXMub3B0aW9ucy5mYWxsYmFjay5jYWxsKF9hc3NlcnRUaGlzSW5pdGlhbGl6ZWQoX3RoaXMpKSk7XG4gICAgfSAvLyBAb3B0aW9ucy51cmwgPSBAZWxlbWVudC5nZXRBdHRyaWJ1dGUgXCJhY3Rpb25cIiB1bmxlc3MgQG9wdGlvbnMudXJsP1xuXG5cbiAgICBpZiAoX3RoaXMub3B0aW9ucy51cmwgPT0gbnVsbCkge1xuICAgICAgX3RoaXMub3B0aW9ucy51cmwgPSBfdGhpcy5lbGVtZW50LmdldEF0dHJpYnV0ZShcImFjdGlvblwiKTtcbiAgICB9XG5cbiAgICBpZiAoIV90aGlzLm9wdGlvbnMudXJsKSB7XG4gICAgICB0aHJvdyBuZXcgRXJyb3IoXCJObyBVUkwgcHJvdmlkZWQuXCIpO1xuICAgIH1cblxuICAgIGlmIChfdGhpcy5vcHRpb25zLmFjY2VwdGVkRmlsZXMgJiYgX3RoaXMub3B0aW9ucy5hY2NlcHRlZE1pbWVUeXBlcykge1xuICAgICAgdGhyb3cgbmV3IEVycm9yKFwiWW91IGNhbid0IHByb3ZpZGUgYm90aCAnYWNjZXB0ZWRGaWxlcycgYW5kICdhY2NlcHRlZE1pbWVUeXBlcycuICdhY2NlcHRlZE1pbWVUeXBlcycgaXMgZGVwcmVjYXRlZC5cIik7XG4gICAgfVxuXG4gICAgaWYgKF90aGlzLm9wdGlvbnMudXBsb2FkTXVsdGlwbGUgJiYgX3RoaXMub3B0aW9ucy5jaHVua2luZykge1xuICAgICAgdGhyb3cgbmV3IEVycm9yKCdZb3UgY2Fubm90IHNldCBib3RoOiB1cGxvYWRNdWx0aXBsZSBhbmQgY2h1bmtpbmcuJyk7XG4gICAgfSAvLyBCYWNrd2FyZHMgY29tcGF0aWJpbGl0eVxuXG5cbiAgICBpZiAoX3RoaXMub3B0aW9ucy5hY2NlcHRlZE1pbWVUeXBlcykge1xuICAgICAgX3RoaXMub3B0aW9ucy5hY2NlcHRlZEZpbGVzID0gX3RoaXMub3B0aW9ucy5hY2NlcHRlZE1pbWVUeXBlcztcbiAgICAgIGRlbGV0ZSBfdGhpcy5vcHRpb25zLmFjY2VwdGVkTWltZVR5cGVzO1xuICAgIH0gLy8gQmFja3dhcmRzIGNvbXBhdGliaWxpdHlcblxuXG4gICAgaWYgKF90aGlzLm9wdGlvbnMucmVuYW1lRmlsZW5hbWUgIT0gbnVsbCkge1xuICAgICAgX3RoaXMub3B0aW9ucy5yZW5hbWVGaWxlID0gZnVuY3Rpb24gKGZpbGUpIHtcbiAgICAgICAgcmV0dXJuIF90aGlzLm9wdGlvbnMucmVuYW1lRmlsZW5hbWUuY2FsbChfYXNzZXJ0VGhpc0luaXRpYWxpemVkKF90aGlzKSwgZmlsZS5uYW1lLCBmaWxlKTtcbiAgICAgIH07XG4gICAgfVxuXG4gICAgaWYgKHR5cGVvZiBfdGhpcy5vcHRpb25zLm1ldGhvZCA9PT0gJ3N0cmluZycpIHtcbiAgICAgIF90aGlzLm9wdGlvbnMubWV0aG9kID0gX3RoaXMub3B0aW9ucy5tZXRob2QudG9VcHBlckNhc2UoKTtcbiAgICB9XG5cbiAgICBpZiAoKGZhbGxiYWNrID0gX3RoaXMuZ2V0RXhpc3RpbmdGYWxsYmFjaygpKSAmJiBmYWxsYmFjay5wYXJlbnROb2RlKSB7XG4gICAgICAvLyBSZW1vdmUgdGhlIGZhbGxiYWNrXG4gICAgICBmYWxsYmFjay5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKGZhbGxiYWNrKTtcbiAgICB9IC8vIERpc3BsYXkgcHJldmlld3MgaW4gdGhlIHByZXZpZXdzQ29udGFpbmVyIGVsZW1lbnQgb3IgdGhlIERyb3B6b25lIGVsZW1lbnQgdW5sZXNzIGV4cGxpY2l0bHkgc2V0IHRvIGZhbHNlXG5cblxuICAgIGlmIChfdGhpcy5vcHRpb25zLnByZXZpZXdzQ29udGFpbmVyICE9PSBmYWxzZSkge1xuICAgICAgaWYgKF90aGlzLm9wdGlvbnMucHJldmlld3NDb250YWluZXIpIHtcbiAgICAgICAgX3RoaXMucHJldmlld3NDb250YWluZXIgPSBEcm9wem9uZS5nZXRFbGVtZW50KF90aGlzLm9wdGlvbnMucHJldmlld3NDb250YWluZXIsIFwicHJldmlld3NDb250YWluZXJcIik7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBfdGhpcy5wcmV2aWV3c0NvbnRhaW5lciA9IF90aGlzLmVsZW1lbnQ7XG4gICAgICB9XG4gICAgfVxuXG4gICAgaWYgKF90aGlzLm9wdGlvbnMuY2xpY2thYmxlKSB7XG4gICAgICBpZiAoX3RoaXMub3B0aW9ucy5jbGlja2FibGUgPT09IHRydWUpIHtcbiAgICAgICAgX3RoaXMuY2xpY2thYmxlRWxlbWVudHMgPSBbX3RoaXMuZWxlbWVudF07XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBfdGhpcy5jbGlja2FibGVFbGVtZW50cyA9IERyb3B6b25lLmdldEVsZW1lbnRzKF90aGlzLm9wdGlvbnMuY2xpY2thYmxlLCBcImNsaWNrYWJsZVwiKTtcbiAgICAgIH1cbiAgICB9XG5cbiAgICBfdGhpcy5pbml0KCk7XG5cbiAgICByZXR1cm4gX3RoaXM7XG4gIH0gLy8gUmV0dXJucyBhbGwgZmlsZXMgdGhhdCBoYXZlIGJlZW4gYWNjZXB0ZWRcblxuXG4gIF9jcmVhdGVDbGFzcyhEcm9wem9uZSwgW3tcbiAgICBrZXk6IFwiZ2V0QWNjZXB0ZWRGaWxlc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBnZXRBY2NlcHRlZEZpbGVzKCkge1xuICAgICAgcmV0dXJuIHRoaXMuZmlsZXMuZmlsdGVyKGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIHJldHVybiBmaWxlLmFjY2VwdGVkO1xuICAgICAgfSkubWFwKGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIHJldHVybiBmaWxlO1xuICAgICAgfSk7XG4gICAgfSAvLyBSZXR1cm5zIGFsbCBmaWxlcyB0aGF0IGhhdmUgYmVlbiByZWplY3RlZFxuICAgIC8vIE5vdCBzdXJlIHdoZW4gdGhhdCdzIGdvaW5nIHRvIGJlIHVzZWZ1bCwgYnV0IGFkZGVkIGZvciBjb21wbGV0ZW5lc3MuXG5cbiAgfSwge1xuICAgIGtleTogXCJnZXRSZWplY3RlZEZpbGVzXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGdldFJlamVjdGVkRmlsZXMoKSB7XG4gICAgICByZXR1cm4gdGhpcy5maWxlcy5maWx0ZXIoZnVuY3Rpb24gKGZpbGUpIHtcbiAgICAgICAgcmV0dXJuICFmaWxlLmFjY2VwdGVkO1xuICAgICAgfSkubWFwKGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIHJldHVybiBmaWxlO1xuICAgICAgfSk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImdldEZpbGVzV2l0aFN0YXR1c1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBnZXRGaWxlc1dpdGhTdGF0dXMoc3RhdHVzKSB7XG4gICAgICByZXR1cm4gdGhpcy5maWxlcy5maWx0ZXIoZnVuY3Rpb24gKGZpbGUpIHtcbiAgICAgICAgcmV0dXJuIGZpbGUuc3RhdHVzID09PSBzdGF0dXM7XG4gICAgICB9KS5tYXAoZnVuY3Rpb24gKGZpbGUpIHtcbiAgICAgICAgcmV0dXJuIGZpbGU7XG4gICAgICB9KTtcbiAgICB9IC8vIFJldHVybnMgYWxsIGZpbGVzIHRoYXQgYXJlIGluIHRoZSBxdWV1ZVxuXG4gIH0sIHtcbiAgICBrZXk6IFwiZ2V0UXVldWVkRmlsZXNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZ2V0UXVldWVkRmlsZXMoKSB7XG4gICAgICByZXR1cm4gdGhpcy5nZXRGaWxlc1dpdGhTdGF0dXMoRHJvcHpvbmUuUVVFVUVEKTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiZ2V0VXBsb2FkaW5nRmlsZXNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZ2V0VXBsb2FkaW5nRmlsZXMoKSB7XG4gICAgICByZXR1cm4gdGhpcy5nZXRGaWxlc1dpdGhTdGF0dXMoRHJvcHpvbmUuVVBMT0FESU5HKTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiZ2V0QWRkZWRGaWxlc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBnZXRBZGRlZEZpbGVzKCkge1xuICAgICAgcmV0dXJuIHRoaXMuZ2V0RmlsZXNXaXRoU3RhdHVzKERyb3B6b25lLkFEREVEKTtcbiAgICB9IC8vIEZpbGVzIHRoYXQgYXJlIGVpdGhlciBxdWV1ZWQgb3IgdXBsb2FkaW5nXG5cbiAgfSwge1xuICAgIGtleTogXCJnZXRBY3RpdmVGaWxlc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBnZXRBY3RpdmVGaWxlcygpIHtcbiAgICAgIHJldHVybiB0aGlzLmZpbGVzLmZpbHRlcihmdW5jdGlvbiAoZmlsZSkge1xuICAgICAgICByZXR1cm4gZmlsZS5zdGF0dXMgPT09IERyb3B6b25lLlVQTE9BRElORyB8fCBmaWxlLnN0YXR1cyA9PT0gRHJvcHpvbmUuUVVFVUVEO1xuICAgICAgfSkubWFwKGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIHJldHVybiBmaWxlO1xuICAgICAgfSk7XG4gICAgfSAvLyBUaGUgZnVuY3Rpb24gdGhhdCBnZXRzIGNhbGxlZCB3aGVuIERyb3B6b25lIGlzIGluaXRpYWxpemVkLiBZb3VcbiAgICAvLyBjYW4gKGFuZCBzaG91bGQpIHNldHVwIGV2ZW50IGxpc3RlbmVycyBpbnNpZGUgdGhpcyBmdW5jdGlvbi5cblxuICB9LCB7XG4gICAga2V5OiBcImluaXRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gaW5pdCgpIHtcbiAgICAgIHZhciBfdGhpczMgPSB0aGlzO1xuXG4gICAgICAvLyBJbiBjYXNlIGl0IGlzbid0IHNldCBhbHJlYWR5XG4gICAgICBpZiAodGhpcy5lbGVtZW50LnRhZ05hbWUgPT09IFwiZm9ybVwiKSB7XG4gICAgICAgIHRoaXMuZWxlbWVudC5zZXRBdHRyaWJ1dGUoXCJlbmN0eXBlXCIsIFwibXVsdGlwYXJ0L2Zvcm0tZGF0YVwiKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHRoaXMuZWxlbWVudC5jbGFzc0xpc3QuY29udGFpbnMoXCJkcm9wem9uZVwiKSAmJiAhdGhpcy5lbGVtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuZHotbWVzc2FnZVwiKSkge1xuICAgICAgICB0aGlzLmVsZW1lbnQuYXBwZW5kQ2hpbGQoRHJvcHpvbmUuY3JlYXRlRWxlbWVudChcIjxkaXYgY2xhc3M9XFxcImR6LWRlZmF1bHQgZHotbWVzc2FnZVxcXCI+PGJ1dHRvbiBjbGFzcz1cXFwiZHotYnV0dG9uXFxcIiB0eXBlPVxcXCJidXR0b25cXFwiPlwiLmNvbmNhdCh0aGlzLm9wdGlvbnMuZGljdERlZmF1bHRNZXNzYWdlLCBcIjwvYnV0dG9uPjwvZGl2PlwiKSkpO1xuICAgICAgfVxuXG4gICAgICBpZiAodGhpcy5jbGlja2FibGVFbGVtZW50cy5sZW5ndGgpIHtcbiAgICAgICAgdmFyIHNldHVwSGlkZGVuRmlsZUlucHV0ID0gZnVuY3Rpb24gc2V0dXBIaWRkZW5GaWxlSW5wdXQoKSB7XG4gICAgICAgICAgaWYgKF90aGlzMy5oaWRkZW5GaWxlSW5wdXQpIHtcbiAgICAgICAgICAgIF90aGlzMy5oaWRkZW5GaWxlSW5wdXQucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChfdGhpczMuaGlkZGVuRmlsZUlucHV0KTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBfdGhpczMuaGlkZGVuRmlsZUlucHV0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImlucHV0XCIpO1xuXG4gICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5zZXRBdHRyaWJ1dGUoXCJ0eXBlXCIsIFwiZmlsZVwiKTtcblxuICAgICAgICAgIGlmIChfdGhpczMub3B0aW9ucy5tYXhGaWxlcyA9PT0gbnVsbCB8fCBfdGhpczMub3B0aW9ucy5tYXhGaWxlcyA+IDEpIHtcbiAgICAgICAgICAgIF90aGlzMy5oaWRkZW5GaWxlSW5wdXQuc2V0QXR0cmlidXRlKFwibXVsdGlwbGVcIiwgXCJtdWx0aXBsZVwiKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBfdGhpczMuaGlkZGVuRmlsZUlucHV0LmNsYXNzTmFtZSA9IFwiZHotaGlkZGVuLWlucHV0XCI7XG5cbiAgICAgICAgICBpZiAoX3RoaXMzLm9wdGlvbnMuYWNjZXB0ZWRGaWxlcyAhPT0gbnVsbCkge1xuICAgICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5zZXRBdHRyaWJ1dGUoXCJhY2NlcHRcIiwgX3RoaXMzLm9wdGlvbnMuYWNjZXB0ZWRGaWxlcyk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgaWYgKF90aGlzMy5vcHRpb25zLmNhcHR1cmUgIT09IG51bGwpIHtcbiAgICAgICAgICAgIF90aGlzMy5oaWRkZW5GaWxlSW5wdXQuc2V0QXR0cmlidXRlKFwiY2FwdHVyZVwiLCBfdGhpczMub3B0aW9ucy5jYXB0dXJlKTtcbiAgICAgICAgICB9IC8vIE5vdCBzZXR0aW5nIGBkaXNwbGF5PVwibm9uZVwiYCBiZWNhdXNlIHNvbWUgYnJvd3NlcnMgZG9uJ3QgYWNjZXB0IGNsaWNrc1xuICAgICAgICAgIC8vIG9uIGVsZW1lbnRzIHRoYXQgYXJlbid0IGRpc3BsYXllZC5cblxuXG4gICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5zdHlsZS52aXNpYmlsaXR5ID0gXCJoaWRkZW5cIjtcbiAgICAgICAgICBfdGhpczMuaGlkZGVuRmlsZUlucHV0LnN0eWxlLnBvc2l0aW9uID0gXCJhYnNvbHV0ZVwiO1xuICAgICAgICAgIF90aGlzMy5oaWRkZW5GaWxlSW5wdXQuc3R5bGUudG9wID0gXCIwXCI7XG4gICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5zdHlsZS5sZWZ0ID0gXCIwXCI7XG4gICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5zdHlsZS5oZWlnaHQgPSBcIjBcIjtcbiAgICAgICAgICBfdGhpczMuaGlkZGVuRmlsZUlucHV0LnN0eWxlLndpZHRoID0gXCIwXCI7XG4gICAgICAgICAgRHJvcHpvbmUuZ2V0RWxlbWVudChfdGhpczMub3B0aW9ucy5oaWRkZW5JbnB1dENvbnRhaW5lciwgJ2hpZGRlbklucHV0Q29udGFpbmVyJykuYXBwZW5kQ2hpbGQoX3RoaXMzLmhpZGRlbkZpbGVJbnB1dCk7XG4gICAgICAgICAgcmV0dXJuIF90aGlzMy5oaWRkZW5GaWxlSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImNoYW5nZVwiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB2YXIgZmlsZXMgPSBfdGhpczMuaGlkZGVuRmlsZUlucHV0LmZpbGVzO1xuXG4gICAgICAgICAgICBpZiAoZmlsZXMubGVuZ3RoKSB7XG4gICAgICAgICAgICAgIHZhciBfaXRlcmF0b3I5ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgICAgICAgICAgX3N0ZXA5O1xuXG4gICAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgICAgZm9yIChfaXRlcmF0b3I5LnMoKTsgIShfc3RlcDkgPSBfaXRlcmF0b3I5Lm4oKSkuZG9uZTspIHtcbiAgICAgICAgICAgICAgICAgIHZhciBmaWxlID0gX3N0ZXA5LnZhbHVlO1xuXG4gICAgICAgICAgICAgICAgICBfdGhpczMuYWRkRmlsZShmaWxlKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICAgIF9pdGVyYXRvcjkuZShlcnIpO1xuICAgICAgICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgICAgICAgIF9pdGVyYXRvcjkuZigpO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIF90aGlzMy5lbWl0KFwiYWRkZWRmaWxlc1wiLCBmaWxlcyk7XG5cbiAgICAgICAgICAgIHJldHVybiBzZXR1cEhpZGRlbkZpbGVJbnB1dCgpO1xuICAgICAgICAgIH0pO1xuICAgICAgICB9O1xuXG4gICAgICAgIHNldHVwSGlkZGVuRmlsZUlucHV0KCk7XG4gICAgICB9XG5cbiAgICAgIHRoaXMuVVJMID0gd2luZG93LlVSTCAhPT0gbnVsbCA/IHdpbmRvdy5VUkwgOiB3aW5kb3cud2Via2l0VVJMOyAvLyBTZXR1cCBhbGwgZXZlbnQgbGlzdGVuZXJzIG9uIHRoZSBEcm9wem9uZSBvYmplY3QgaXRzZWxmLlxuICAgICAgLy8gVGhleSdyZSBub3QgaW4gQHNldHVwRXZlbnRMaXN0ZW5lcnMoKSBiZWNhdXNlIHRoZXkgc2hvdWxkbid0IGJlIHJlbW92ZWRcbiAgICAgIC8vIGFnYWluIHdoZW4gdGhlIGRyb3B6b25lIGdldHMgZGlzYWJsZWQuXG5cbiAgICAgIHZhciBfaXRlcmF0b3IxMCA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKHRoaXMuZXZlbnRzKSxcbiAgICAgICAgICBfc3RlcDEwO1xuXG4gICAgICB0cnkge1xuICAgICAgICBmb3IgKF9pdGVyYXRvcjEwLnMoKTsgIShfc3RlcDEwID0gX2l0ZXJhdG9yMTAubigpKS5kb25lOykge1xuICAgICAgICAgIHZhciBldmVudE5hbWUgPSBfc3RlcDEwLnZhbHVlO1xuICAgICAgICAgIHRoaXMub24oZXZlbnROYW1lLCB0aGlzLm9wdGlvbnNbZXZlbnROYW1lXSk7XG4gICAgICAgIH1cbiAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICBfaXRlcmF0b3IxMC5lKGVycik7XG4gICAgICB9IGZpbmFsbHkge1xuICAgICAgICBfaXRlcmF0b3IxMC5mKCk7XG4gICAgICB9XG5cbiAgICAgIHRoaXMub24oXCJ1cGxvYWRwcm9ncmVzc1wiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiBfdGhpczMudXBkYXRlVG90YWxVcGxvYWRQcm9ncmVzcygpO1xuICAgICAgfSk7XG4gICAgICB0aGlzLm9uKFwicmVtb3ZlZGZpbGVcIiwgZnVuY3Rpb24gKCkge1xuICAgICAgICByZXR1cm4gX3RoaXMzLnVwZGF0ZVRvdGFsVXBsb2FkUHJvZ3Jlc3MoKTtcbiAgICAgIH0pO1xuICAgICAgdGhpcy5vbihcImNhbmNlbGVkXCIsIGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIHJldHVybiBfdGhpczMuZW1pdChcImNvbXBsZXRlXCIsIGZpbGUpO1xuICAgICAgfSk7IC8vIEVtaXQgYSBgcXVldWVjb21wbGV0ZWAgZXZlbnQgaWYgYWxsIGZpbGVzIGZpbmlzaGVkIHVwbG9hZGluZy5cblxuICAgICAgdGhpcy5vbihcImNvbXBsZXRlXCIsIGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgIGlmIChfdGhpczMuZ2V0QWRkZWRGaWxlcygpLmxlbmd0aCA9PT0gMCAmJiBfdGhpczMuZ2V0VXBsb2FkaW5nRmlsZXMoKS5sZW5ndGggPT09IDAgJiYgX3RoaXMzLmdldFF1ZXVlZEZpbGVzKCkubGVuZ3RoID09PSAwKSB7XG4gICAgICAgICAgLy8gVGhpcyBuZWVkcyB0byBiZSBkZWZlcnJlZCBzbyB0aGF0IGBxdWV1ZWNvbXBsZXRlYCByZWFsbHkgdHJpZ2dlcnMgYWZ0ZXIgYGNvbXBsZXRlYFxuICAgICAgICAgIHJldHVybiBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIHJldHVybiBfdGhpczMuZW1pdChcInF1ZXVlY29tcGxldGVcIik7XG4gICAgICAgICAgfSwgMCk7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuXG4gICAgICB2YXIgY29udGFpbnNGaWxlcyA9IGZ1bmN0aW9uIGNvbnRhaW5zRmlsZXMoZSkge1xuICAgICAgICBpZiAoZS5kYXRhVHJhbnNmZXIudHlwZXMpIHtcbiAgICAgICAgICAvLyBCZWNhdXNlIGUuZGF0YVRyYW5zZmVyLnR5cGVzIGlzIGFuIE9iamVjdCBpblxuICAgICAgICAgIC8vIElFLCB3ZSBuZWVkIHRvIGl0ZXJhdGUgbGlrZSB0aGlzIGluc3RlYWQgb2ZcbiAgICAgICAgICAvLyB1c2luZyBlLmRhdGFUcmFuc2Zlci50eXBlcy5zb21lKClcbiAgICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGUuZGF0YVRyYW5zZmVyLnR5cGVzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICBpZiAoZS5kYXRhVHJhbnNmZXIudHlwZXNbaV0gPT09IFwiRmlsZXNcIikgcmV0dXJuIHRydWU7XG4gICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgICAgfTtcblxuICAgICAgdmFyIG5vUHJvcGFnYXRpb24gPSBmdW5jdGlvbiBub1Byb3BhZ2F0aW9uKGUpIHtcbiAgICAgICAgLy8gSWYgdGhlcmUgYXJlIG5vIGZpbGVzLCB3ZSBkb24ndCB3YW50IHRvIHN0b3BcbiAgICAgICAgLy8gcHJvcGFnYXRpb24gc28gd2UgZG9uJ3QgaW50ZXJmZXJlIHdpdGggb3RoZXJcbiAgICAgICAgLy8gZHJhZyBhbmQgZHJvcCBiZWhhdmlvdXIuXG4gICAgICAgIGlmICghY29udGFpbnNGaWxlcyhlKSkgcmV0dXJuO1xuICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuXG4gICAgICAgIGlmIChlLnByZXZlbnREZWZhdWx0KSB7XG4gICAgICAgICAgcmV0dXJuIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICByZXR1cm4gZS5yZXR1cm5WYWx1ZSA9IGZhbHNlO1xuICAgICAgICB9XG4gICAgICB9OyAvLyBDcmVhdGUgdGhlIGxpc3RlbmVyc1xuXG5cbiAgICAgIHRoaXMubGlzdGVuZXJzID0gW3tcbiAgICAgICAgZWxlbWVudDogdGhpcy5lbGVtZW50LFxuICAgICAgICBldmVudHM6IHtcbiAgICAgICAgICBcImRyYWdzdGFydFwiOiBmdW5jdGlvbiBkcmFnc3RhcnQoZSkge1xuICAgICAgICAgICAgcmV0dXJuIF90aGlzMy5lbWl0KFwiZHJhZ3N0YXJ0XCIsIGUpO1xuICAgICAgICAgIH0sXG4gICAgICAgICAgXCJkcmFnZW50ZXJcIjogZnVuY3Rpb24gZHJhZ2VudGVyKGUpIHtcbiAgICAgICAgICAgIG5vUHJvcGFnYXRpb24oZSk7XG4gICAgICAgICAgICByZXR1cm4gX3RoaXMzLmVtaXQoXCJkcmFnZW50ZXJcIiwgZSk7XG4gICAgICAgICAgfSxcbiAgICAgICAgICBcImRyYWdvdmVyXCI6IGZ1bmN0aW9uIGRyYWdvdmVyKGUpIHtcbiAgICAgICAgICAgIC8vIE1ha2VzIGl0IHBvc3NpYmxlIHRvIGRyYWcgZmlsZXMgZnJvbSBjaHJvbWUncyBkb3dubG9hZCBiYXJcbiAgICAgICAgICAgIC8vIGh0dHA6Ly9zdGFja292ZXJmbG93LmNvbS9xdWVzdGlvbnMvMTk1MjY0MzAvZHJhZy1hbmQtZHJvcC1maWxlLXVwbG9hZHMtZnJvbS1jaHJvbWUtZG93bmxvYWRzLWJhclxuICAgICAgICAgICAgLy8gVHJ5IGlzIHJlcXVpcmVkIHRvIHByZXZlbnQgYnVnIGluIEludGVybmV0IEV4cGxvcmVyIDExIChTQ1JJUFQ2NTUzNSBleGNlcHRpb24pXG4gICAgICAgICAgICB2YXIgZWZjdDtcblxuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgZWZjdCA9IGUuZGF0YVRyYW5zZmVyLmVmZmVjdEFsbG93ZWQ7XG4gICAgICAgICAgICB9IGNhdGNoIChlcnJvcikge31cblxuICAgICAgICAgICAgZS5kYXRhVHJhbnNmZXIuZHJvcEVmZmVjdCA9ICdtb3ZlJyA9PT0gZWZjdCB8fCAnbGlua01vdmUnID09PSBlZmN0ID8gJ21vdmUnIDogJ2NvcHknO1xuICAgICAgICAgICAgbm9Qcm9wYWdhdGlvbihlKTtcbiAgICAgICAgICAgIHJldHVybiBfdGhpczMuZW1pdChcImRyYWdvdmVyXCIsIGUpO1xuICAgICAgICAgIH0sXG4gICAgICAgICAgXCJkcmFnbGVhdmVcIjogZnVuY3Rpb24gZHJhZ2xlYXZlKGUpIHtcbiAgICAgICAgICAgIHJldHVybiBfdGhpczMuZW1pdChcImRyYWdsZWF2ZVwiLCBlKTtcbiAgICAgICAgICB9LFxuICAgICAgICAgIFwiZHJvcFwiOiBmdW5jdGlvbiBkcm9wKGUpIHtcbiAgICAgICAgICAgIG5vUHJvcGFnYXRpb24oZSk7XG4gICAgICAgICAgICByZXR1cm4gX3RoaXMzLmRyb3AoZSk7XG4gICAgICAgICAgfSxcbiAgICAgICAgICBcImRyYWdlbmRcIjogZnVuY3Rpb24gZHJhZ2VuZChlKSB7XG4gICAgICAgICAgICByZXR1cm4gX3RoaXMzLmVtaXQoXCJkcmFnZW5kXCIsIGUpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSAvLyBUaGlzIGlzIGRpc2FibGVkIHJpZ2h0IG5vdywgYmVjYXVzZSB0aGUgYnJvd3NlcnMgZG9uJ3QgaW1wbGVtZW50IGl0IHByb3Blcmx5LlxuICAgICAgICAvLyBcInBhc3RlXCI6IChlKSA9PlxuICAgICAgICAvLyAgIG5vUHJvcGFnYXRpb24gZVxuICAgICAgICAvLyAgIEBwYXN0ZSBlXG5cbiAgICAgIH1dO1xuICAgICAgdGhpcy5jbGlja2FibGVFbGVtZW50cy5mb3JFYWNoKGZ1bmN0aW9uIChjbGlja2FibGVFbGVtZW50KSB7XG4gICAgICAgIHJldHVybiBfdGhpczMubGlzdGVuZXJzLnB1c2goe1xuICAgICAgICAgIGVsZW1lbnQ6IGNsaWNrYWJsZUVsZW1lbnQsXG4gICAgICAgICAgZXZlbnRzOiB7XG4gICAgICAgICAgICBcImNsaWNrXCI6IGZ1bmN0aW9uIGNsaWNrKGV2dCkge1xuICAgICAgICAgICAgICAvLyBPbmx5IHRoZSBhY3R1YWwgZHJvcHpvbmUgb3IgdGhlIG1lc3NhZ2UgZWxlbWVudCBzaG91bGQgdHJpZ2dlciBmaWxlIHNlbGVjdGlvblxuICAgICAgICAgICAgICBpZiAoY2xpY2thYmxlRWxlbWVudCAhPT0gX3RoaXMzLmVsZW1lbnQgfHwgZXZ0LnRhcmdldCA9PT0gX3RoaXMzLmVsZW1lbnQgfHwgRHJvcHpvbmUuZWxlbWVudEluc2lkZShldnQudGFyZ2V0LCBfdGhpczMuZWxlbWVudC5xdWVyeVNlbGVjdG9yKFwiLmR6LW1lc3NhZ2VcIikpKSB7XG4gICAgICAgICAgICAgICAgX3RoaXMzLmhpZGRlbkZpbGVJbnB1dC5jbGljaygpOyAvLyBGb3J3YXJkIHRoZSBjbGlja1xuXG4gICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG4gICAgICB0aGlzLmVuYWJsZSgpO1xuICAgICAgcmV0dXJuIHRoaXMub3B0aW9ucy5pbml0LmNhbGwodGhpcyk7XG4gICAgfSAvLyBOb3QgZnVsbHkgdGVzdGVkIHlldFxuXG4gIH0sIHtcbiAgICBrZXk6IFwiZGVzdHJveVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBkZXN0cm95KCkge1xuICAgICAgdGhpcy5kaXNhYmxlKCk7XG4gICAgICB0aGlzLnJlbW92ZUFsbEZpbGVzKHRydWUpO1xuXG4gICAgICBpZiAodGhpcy5oaWRkZW5GaWxlSW5wdXQgIT0gbnVsbCA/IHRoaXMuaGlkZGVuRmlsZUlucHV0LnBhcmVudE5vZGUgOiB1bmRlZmluZWQpIHtcbiAgICAgICAgdGhpcy5oaWRkZW5GaWxlSW5wdXQucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh0aGlzLmhpZGRlbkZpbGVJbnB1dCk7XG4gICAgICAgIHRoaXMuaGlkZGVuRmlsZUlucHV0ID0gbnVsbDtcbiAgICAgIH1cblxuICAgICAgZGVsZXRlIHRoaXMuZWxlbWVudC5kcm9wem9uZTtcbiAgICAgIHJldHVybiBEcm9wem9uZS5pbnN0YW5jZXMuc3BsaWNlKERyb3B6b25lLmluc3RhbmNlcy5pbmRleE9mKHRoaXMpLCAxKTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwidXBkYXRlVG90YWxVcGxvYWRQcm9ncmVzc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1cGRhdGVUb3RhbFVwbG9hZFByb2dyZXNzKCkge1xuICAgICAgdmFyIHRvdGFsVXBsb2FkUHJvZ3Jlc3M7XG4gICAgICB2YXIgdG90YWxCeXRlc1NlbnQgPSAwO1xuICAgICAgdmFyIHRvdGFsQnl0ZXMgPSAwO1xuICAgICAgdmFyIGFjdGl2ZUZpbGVzID0gdGhpcy5nZXRBY3RpdmVGaWxlcygpO1xuXG4gICAgICBpZiAoYWN0aXZlRmlsZXMubGVuZ3RoKSB7XG4gICAgICAgIHZhciBfaXRlcmF0b3IxMSA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKHRoaXMuZ2V0QWN0aXZlRmlsZXMoKSksXG4gICAgICAgICAgICBfc3RlcDExO1xuXG4gICAgICAgIHRyeSB7XG4gICAgICAgICAgZm9yIChfaXRlcmF0b3IxMS5zKCk7ICEoX3N0ZXAxMSA9IF9pdGVyYXRvcjExLm4oKSkuZG9uZTspIHtcbiAgICAgICAgICAgIHZhciBmaWxlID0gX3N0ZXAxMS52YWx1ZTtcbiAgICAgICAgICAgIHRvdGFsQnl0ZXNTZW50ICs9IGZpbGUudXBsb2FkLmJ5dGVzU2VudDtcbiAgICAgICAgICAgIHRvdGFsQnl0ZXMgKz0gZmlsZS51cGxvYWQudG90YWw7XG4gICAgICAgICAgfVxuICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICBfaXRlcmF0b3IxMS5lKGVycik7XG4gICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMTEuZigpO1xuICAgICAgICB9XG5cbiAgICAgICAgdG90YWxVcGxvYWRQcm9ncmVzcyA9IDEwMCAqIHRvdGFsQnl0ZXNTZW50IC8gdG90YWxCeXRlcztcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIHRvdGFsVXBsb2FkUHJvZ3Jlc3MgPSAxMDA7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiB0aGlzLmVtaXQoXCJ0b3RhbHVwbG9hZHByb2dyZXNzXCIsIHRvdGFsVXBsb2FkUHJvZ3Jlc3MsIHRvdGFsQnl0ZXMsIHRvdGFsQnl0ZXNTZW50KTtcbiAgICB9IC8vIEBvcHRpb25zLnBhcmFtTmFtZSBjYW4gYmUgYSBmdW5jdGlvbiB0YWtpbmcgb25lIHBhcmFtZXRlciByYXRoZXIgdGhhbiBhIHN0cmluZy5cbiAgICAvLyBBIHBhcmFtZXRlciBuYW1lIGZvciBhIGZpbGUgaXMgb2J0YWluZWQgc2ltcGx5IGJ5IGNhbGxpbmcgdGhpcyB3aXRoIGFuIGluZGV4IG51bWJlci5cblxuICB9LCB7XG4gICAga2V5OiBcIl9nZXRQYXJhbU5hbWVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX2dldFBhcmFtTmFtZShuKSB7XG4gICAgICBpZiAodHlwZW9mIHRoaXMub3B0aW9ucy5wYXJhbU5hbWUgPT09IFwiZnVuY3Rpb25cIikge1xuICAgICAgICByZXR1cm4gdGhpcy5vcHRpb25zLnBhcmFtTmFtZShuKTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIHJldHVybiBcIlwiLmNvbmNhdCh0aGlzLm9wdGlvbnMucGFyYW1OYW1lKS5jb25jYXQodGhpcy5vcHRpb25zLnVwbG9hZE11bHRpcGxlID8gXCJbXCIuY29uY2F0KG4sIFwiXVwiKSA6IFwiXCIpO1xuICAgICAgfVxuICAgIH0gLy8gSWYgQG9wdGlvbnMucmVuYW1lRmlsZSBpcyBhIGZ1bmN0aW9uLFxuICAgIC8vIHRoZSBmdW5jdGlvbiB3aWxsIGJlIHVzZWQgdG8gcmVuYW1lIHRoZSBmaWxlLm5hbWUgYmVmb3JlIGFwcGVuZGluZyBpdCB0byB0aGUgZm9ybURhdGFcblxuICB9LCB7XG4gICAga2V5OiBcIl9yZW5hbWVGaWxlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9yZW5hbWVGaWxlKGZpbGUpIHtcbiAgICAgIGlmICh0eXBlb2YgdGhpcy5vcHRpb25zLnJlbmFtZUZpbGUgIT09IFwiZnVuY3Rpb25cIikge1xuICAgICAgICByZXR1cm4gZmlsZS5uYW1lO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gdGhpcy5vcHRpb25zLnJlbmFtZUZpbGUoZmlsZSk7XG4gICAgfSAvLyBSZXR1cm5zIGEgZm9ybSB0aGF0IGNhbiBiZSB1c2VkIGFzIGZhbGxiYWNrIGlmIHRoZSBicm93c2VyIGRvZXMgbm90IHN1cHBvcnQgRHJhZ25Ecm9wXG4gICAgLy9cbiAgICAvLyBJZiB0aGUgZHJvcHpvbmUgaXMgYWxyZWFkeSBhIGZvcm0sIG9ubHkgdGhlIGlucHV0IGZpZWxkIGFuZCBidXR0b24gYXJlIHJldHVybmVkLiBPdGhlcndpc2UgYSBjb21wbGV0ZSBmb3JtIGVsZW1lbnQgaXMgcHJvdmlkZWQuXG4gICAgLy8gVGhpcyBjb2RlIGhhcyB0byBwYXNzIGluIElFNyA6KFxuXG4gIH0sIHtcbiAgICBrZXk6IFwiZ2V0RmFsbGJhY2tGb3JtXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGdldEZhbGxiYWNrRm9ybSgpIHtcbiAgICAgIHZhciBleGlzdGluZ0ZhbGxiYWNrLCBmb3JtO1xuXG4gICAgICBpZiAoZXhpc3RpbmdGYWxsYmFjayA9IHRoaXMuZ2V0RXhpc3RpbmdGYWxsYmFjaygpKSB7XG4gICAgICAgIHJldHVybiBleGlzdGluZ0ZhbGxiYWNrO1xuICAgICAgfVxuXG4gICAgICB2YXIgZmllbGRzU3RyaW5nID0gXCI8ZGl2IGNsYXNzPVxcXCJkei1mYWxsYmFja1xcXCI+XCI7XG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMuZGljdEZhbGxiYWNrVGV4dCkge1xuICAgICAgICBmaWVsZHNTdHJpbmcgKz0gXCI8cD5cIi5jb25jYXQodGhpcy5vcHRpb25zLmRpY3RGYWxsYmFja1RleHQsIFwiPC9wPlwiKTtcbiAgICAgIH1cblxuICAgICAgZmllbGRzU3RyaW5nICs9IFwiPGlucHV0IHR5cGU9XFxcImZpbGVcXFwiIG5hbWU9XFxcIlwiLmNvbmNhdCh0aGlzLl9nZXRQYXJhbU5hbWUoMCksIFwiXFxcIiBcIikuY29uY2F0KHRoaXMub3B0aW9ucy51cGxvYWRNdWx0aXBsZSA/ICdtdWx0aXBsZT1cIm11bHRpcGxlXCInIDogdW5kZWZpbmVkLCBcIiAvPjxpbnB1dCB0eXBlPVxcXCJzdWJtaXRcXFwiIHZhbHVlPVxcXCJVcGxvYWQhXFxcIj48L2Rpdj5cIik7XG4gICAgICB2YXIgZmllbGRzID0gRHJvcHpvbmUuY3JlYXRlRWxlbWVudChmaWVsZHNTdHJpbmcpO1xuXG4gICAgICBpZiAodGhpcy5lbGVtZW50LnRhZ05hbWUgIT09IFwiRk9STVwiKSB7XG4gICAgICAgIGZvcm0gPSBEcm9wem9uZS5jcmVhdGVFbGVtZW50KFwiPGZvcm0gYWN0aW9uPVxcXCJcIi5jb25jYXQodGhpcy5vcHRpb25zLnVybCwgXCJcXFwiIGVuY3R5cGU9XFxcIm11bHRpcGFydC9mb3JtLWRhdGFcXFwiIG1ldGhvZD1cXFwiXCIpLmNvbmNhdCh0aGlzLm9wdGlvbnMubWV0aG9kLCBcIlxcXCI+PC9mb3JtPlwiKSk7XG4gICAgICAgIGZvcm0uYXBwZW5kQ2hpbGQoZmllbGRzKTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIC8vIE1ha2Ugc3VyZSB0aGF0IHRoZSBlbmN0eXBlIGFuZCBtZXRob2QgYXR0cmlidXRlcyBhcmUgc2V0IHByb3Blcmx5XG4gICAgICAgIHRoaXMuZWxlbWVudC5zZXRBdHRyaWJ1dGUoXCJlbmN0eXBlXCIsIFwibXVsdGlwYXJ0L2Zvcm0tZGF0YVwiKTtcbiAgICAgICAgdGhpcy5lbGVtZW50LnNldEF0dHJpYnV0ZShcIm1ldGhvZFwiLCB0aGlzLm9wdGlvbnMubWV0aG9kKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIGZvcm0gIT0gbnVsbCA/IGZvcm0gOiBmaWVsZHM7XG4gICAgfSAvLyBSZXR1cm5zIHRoZSBmYWxsYmFjayBlbGVtZW50cyBpZiB0aGV5IGV4aXN0IGFscmVhZHlcbiAgICAvL1xuICAgIC8vIFRoaXMgY29kZSBoYXMgdG8gcGFzcyBpbiBJRTcgOihcblxuICB9LCB7XG4gICAga2V5OiBcImdldEV4aXN0aW5nRmFsbGJhY2tcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZ2V0RXhpc3RpbmdGYWxsYmFjaygpIHtcbiAgICAgIHZhciBnZXRGYWxsYmFjayA9IGZ1bmN0aW9uIGdldEZhbGxiYWNrKGVsZW1lbnRzKSB7XG4gICAgICAgIHZhciBfaXRlcmF0b3IxMiA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGVsZW1lbnRzKSxcbiAgICAgICAgICAgIF9zdGVwMTI7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjEyLnMoKTsgIShfc3RlcDEyID0gX2l0ZXJhdG9yMTIubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIGVsID0gX3N0ZXAxMi52YWx1ZTtcblxuICAgICAgICAgICAgaWYgKC8oXnwgKWZhbGxiYWNrKCR8ICkvLnRlc3QoZWwuY2xhc3NOYW1lKSkge1xuICAgICAgICAgICAgICByZXR1cm4gZWw7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfVxuICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICBfaXRlcmF0b3IxMi5lKGVycik7XG4gICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMTIuZigpO1xuICAgICAgICB9XG4gICAgICB9O1xuXG4gICAgICBmb3IgKHZhciBfaTIgPSAwLCBfYXJyID0gW1wiZGl2XCIsIFwiZm9ybVwiXTsgX2kyIDwgX2Fyci5sZW5ndGg7IF9pMisrKSB7XG4gICAgICAgIHZhciB0YWdOYW1lID0gX2FycltfaTJdO1xuICAgICAgICB2YXIgZmFsbGJhY2s7XG5cbiAgICAgICAgaWYgKGZhbGxiYWNrID0gZ2V0RmFsbGJhY2sodGhpcy5lbGVtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKHRhZ05hbWUpKSkge1xuICAgICAgICAgIHJldHVybiBmYWxsYmFjaztcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH0gLy8gQWN0aXZhdGVzIGFsbCBsaXN0ZW5lcnMgc3RvcmVkIGluIEBsaXN0ZW5lcnNcblxuICB9LCB7XG4gICAga2V5OiBcInNldHVwRXZlbnRMaXN0ZW5lcnNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gc2V0dXBFdmVudExpc3RlbmVycygpIHtcbiAgICAgIHJldHVybiB0aGlzLmxpc3RlbmVycy5tYXAoZnVuY3Rpb24gKGVsZW1lbnRMaXN0ZW5lcnMpIHtcbiAgICAgICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICB2YXIgcmVzdWx0ID0gW107XG5cbiAgICAgICAgICBmb3IgKHZhciBldmVudCBpbiBlbGVtZW50TGlzdGVuZXJzLmV2ZW50cykge1xuICAgICAgICAgICAgdmFyIGxpc3RlbmVyID0gZWxlbWVudExpc3RlbmVycy5ldmVudHNbZXZlbnRdO1xuICAgICAgICAgICAgcmVzdWx0LnB1c2goZWxlbWVudExpc3RlbmVycy5lbGVtZW50LmFkZEV2ZW50TGlzdGVuZXIoZXZlbnQsIGxpc3RlbmVyLCBmYWxzZSkpO1xuICAgICAgICAgIH1cblxuICAgICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgICAgIH0oKTtcbiAgICAgIH0pO1xuICAgIH0gLy8gRGVhY3RpdmF0ZXMgYWxsIGxpc3RlbmVycyBzdG9yZWQgaW4gQGxpc3RlbmVyc1xuXG4gIH0sIHtcbiAgICBrZXk6IFwicmVtb3ZlRXZlbnRMaXN0ZW5lcnNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gcmVtb3ZlRXZlbnRMaXN0ZW5lcnMoKSB7XG4gICAgICByZXR1cm4gdGhpcy5saXN0ZW5lcnMubWFwKGZ1bmN0aW9uIChlbGVtZW50TGlzdGVuZXJzKSB7XG4gICAgICAgIHJldHVybiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgdmFyIHJlc3VsdCA9IFtdO1xuXG4gICAgICAgICAgZm9yICh2YXIgZXZlbnQgaW4gZWxlbWVudExpc3RlbmVycy5ldmVudHMpIHtcbiAgICAgICAgICAgIHZhciBsaXN0ZW5lciA9IGVsZW1lbnRMaXN0ZW5lcnMuZXZlbnRzW2V2ZW50XTtcbiAgICAgICAgICAgIHJlc3VsdC5wdXNoKGVsZW1lbnRMaXN0ZW5lcnMuZWxlbWVudC5yZW1vdmVFdmVudExpc3RlbmVyKGV2ZW50LCBsaXN0ZW5lciwgZmFsc2UpKTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm4gcmVzdWx0O1xuICAgICAgICB9KCk7XG4gICAgICB9KTtcbiAgICB9IC8vIFJlbW92ZXMgYWxsIGV2ZW50IGxpc3RlbmVycyBhbmQgY2FuY2VscyBhbGwgZmlsZXMgaW4gdGhlIHF1ZXVlIG9yIGJlaW5nIHByb2Nlc3NlZC5cblxuICB9LCB7XG4gICAga2V5OiBcImRpc2FibGVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZGlzYWJsZSgpIHtcbiAgICAgIHZhciBfdGhpczQgPSB0aGlzO1xuXG4gICAgICB0aGlzLmNsaWNrYWJsZUVsZW1lbnRzLmZvckVhY2goZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgICAgICAgcmV0dXJuIGVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZShcImR6LWNsaWNrYWJsZVwiKTtcbiAgICAgIH0pO1xuICAgICAgdGhpcy5yZW1vdmVFdmVudExpc3RlbmVycygpO1xuICAgICAgdGhpcy5kaXNhYmxlZCA9IHRydWU7XG4gICAgICByZXR1cm4gdGhpcy5maWxlcy5tYXAoZnVuY3Rpb24gKGZpbGUpIHtcbiAgICAgICAgcmV0dXJuIF90aGlzNC5jYW5jZWxVcGxvYWQoZmlsZSk7XG4gICAgICB9KTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiZW5hYmxlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVuYWJsZSgpIHtcbiAgICAgIGRlbGV0ZSB0aGlzLmRpc2FibGVkO1xuICAgICAgdGhpcy5jbGlja2FibGVFbGVtZW50cy5mb3JFYWNoKGZ1bmN0aW9uIChlbGVtZW50KSB7XG4gICAgICAgIHJldHVybiBlbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJkei1jbGlja2FibGVcIik7XG4gICAgICB9KTtcbiAgICAgIHJldHVybiB0aGlzLnNldHVwRXZlbnRMaXN0ZW5lcnMoKTtcbiAgICB9IC8vIFJldHVybnMgYSBuaWNlbHkgZm9ybWF0dGVkIGZpbGVzaXplXG5cbiAgfSwge1xuICAgIGtleTogXCJmaWxlc2l6ZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBmaWxlc2l6ZShzaXplKSB7XG4gICAgICB2YXIgc2VsZWN0ZWRTaXplID0gMDtcbiAgICAgIHZhciBzZWxlY3RlZFVuaXQgPSBcImJcIjtcblxuICAgICAgaWYgKHNpemUgPiAwKSB7XG4gICAgICAgIHZhciB1bml0cyA9IFsndGInLCAnZ2InLCAnbWInLCAna2InLCAnYiddO1xuXG4gICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgdW5pdHMubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgICB2YXIgdW5pdCA9IHVuaXRzW2ldO1xuICAgICAgICAgIHZhciBjdXRvZmYgPSBNYXRoLnBvdyh0aGlzLm9wdGlvbnMuZmlsZXNpemVCYXNlLCA0IC0gaSkgLyAxMDtcblxuICAgICAgICAgIGlmIChzaXplID49IGN1dG9mZikge1xuICAgICAgICAgICAgc2VsZWN0ZWRTaXplID0gc2l6ZSAvIE1hdGgucG93KHRoaXMub3B0aW9ucy5maWxlc2l6ZUJhc2UsIDQgLSBpKTtcbiAgICAgICAgICAgIHNlbGVjdGVkVW5pdCA9IHVuaXQ7XG4gICAgICAgICAgICBicmVhaztcbiAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICBzZWxlY3RlZFNpemUgPSBNYXRoLnJvdW5kKDEwICogc2VsZWN0ZWRTaXplKSAvIDEwOyAvLyBDdXR0aW5nIG9mIGRpZ2l0c1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gXCI8c3Ryb25nPlwiLmNvbmNhdChzZWxlY3RlZFNpemUsIFwiPC9zdHJvbmc+IFwiKS5jb25jYXQodGhpcy5vcHRpb25zLmRpY3RGaWxlU2l6ZVVuaXRzW3NlbGVjdGVkVW5pdF0pO1xuICAgIH0gLy8gQWRkcyBvciByZW1vdmVzIHRoZSBgZHotbWF4LWZpbGVzLXJlYWNoZWRgIGNsYXNzIGZyb20gdGhlIGZvcm0uXG5cbiAgfSwge1xuICAgIGtleTogXCJfdXBkYXRlTWF4RmlsZXNSZWFjaGVkQ2xhc3NcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX3VwZGF0ZU1heEZpbGVzUmVhY2hlZENsYXNzKCkge1xuICAgICAgaWYgKHRoaXMub3B0aW9ucy5tYXhGaWxlcyAhPSBudWxsICYmIHRoaXMuZ2V0QWNjZXB0ZWRGaWxlcygpLmxlbmd0aCA+PSB0aGlzLm9wdGlvbnMubWF4RmlsZXMpIHtcbiAgICAgICAgaWYgKHRoaXMuZ2V0QWNjZXB0ZWRGaWxlcygpLmxlbmd0aCA9PT0gdGhpcy5vcHRpb25zLm1heEZpbGVzKSB7XG4gICAgICAgICAgdGhpcy5lbWl0KCdtYXhmaWxlc3JlYWNoZWQnLCB0aGlzLmZpbGVzKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiB0aGlzLmVsZW1lbnQuY2xhc3NMaXN0LmFkZChcImR6LW1heC1maWxlcy1yZWFjaGVkXCIpO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuZWxlbWVudC5jbGFzc0xpc3QucmVtb3ZlKFwiZHotbWF4LWZpbGVzLXJlYWNoZWRcIik7XG4gICAgICB9XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImRyb3BcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZHJvcChlKSB7XG4gICAgICBpZiAoIWUuZGF0YVRyYW5zZmVyKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgdGhpcy5lbWl0KFwiZHJvcFwiLCBlKTsgLy8gQ29udmVydCB0aGUgRmlsZUxpc3QgdG8gYW4gQXJyYXlcbiAgICAgIC8vIFRoaXMgaXMgbmVjZXNzYXJ5IGZvciBJRTExXG5cbiAgICAgIHZhciBmaWxlcyA9IFtdO1xuXG4gICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGUuZGF0YVRyYW5zZmVyLmZpbGVzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgIGZpbGVzW2ldID0gZS5kYXRhVHJhbnNmZXIuZmlsZXNbaV07XG4gICAgICB9IC8vIEV2ZW4gaWYgaXQncyBhIGZvbGRlciwgZmlsZXMubGVuZ3RoIHdpbGwgY29udGFpbiB0aGUgZm9sZGVycy5cblxuXG4gICAgICBpZiAoZmlsZXMubGVuZ3RoKSB7XG4gICAgICAgIHZhciBpdGVtcyA9IGUuZGF0YVRyYW5zZmVyLml0ZW1zO1xuXG4gICAgICAgIGlmIChpdGVtcyAmJiBpdGVtcy5sZW5ndGggJiYgaXRlbXNbMF0ud2Via2l0R2V0QXNFbnRyeSAhPSBudWxsKSB7XG4gICAgICAgICAgLy8gVGhlIGJyb3dzZXIgc3VwcG9ydHMgZHJvcHBpbmcgb2YgZm9sZGVycywgc28gaGFuZGxlIGl0ZW1zIGluc3RlYWQgb2YgZmlsZXNcbiAgICAgICAgICB0aGlzLl9hZGRGaWxlc0Zyb21JdGVtcyhpdGVtcyk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgdGhpcy5oYW5kbGVGaWxlcyhmaWxlcyk7XG4gICAgICAgIH1cbiAgICAgIH1cblxuICAgICAgdGhpcy5lbWl0KFwiYWRkZWRmaWxlc1wiLCBmaWxlcyk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcInBhc3RlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHBhc3RlKGUpIHtcbiAgICAgIGlmIChfX2d1YXJkX18oZSAhPSBudWxsID8gZS5jbGlwYm9hcmREYXRhIDogdW5kZWZpbmVkLCBmdW5jdGlvbiAoeCkge1xuICAgICAgICByZXR1cm4geC5pdGVtcztcbiAgICAgIH0pID09IG51bGwpIHtcbiAgICAgICAgcmV0dXJuO1xuICAgICAgfVxuXG4gICAgICB0aGlzLmVtaXQoXCJwYXN0ZVwiLCBlKTtcbiAgICAgIHZhciBpdGVtcyA9IGUuY2xpcGJvYXJkRGF0YS5pdGVtcztcblxuICAgICAgaWYgKGl0ZW1zLmxlbmd0aCkge1xuICAgICAgICByZXR1cm4gdGhpcy5fYWRkRmlsZXNGcm9tSXRlbXMoaXRlbXMpO1xuICAgICAgfVxuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJoYW5kbGVGaWxlc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBoYW5kbGVGaWxlcyhmaWxlcykge1xuICAgICAgdmFyIF9pdGVyYXRvcjEzID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgIF9zdGVwMTM7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMTMucygpOyAhKF9zdGVwMTMgPSBfaXRlcmF0b3IxMy5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIGZpbGUgPSBfc3RlcDEzLnZhbHVlO1xuICAgICAgICAgIHRoaXMuYWRkRmlsZShmaWxlKTtcbiAgICAgICAgfVxuICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgIF9pdGVyYXRvcjEzLmUoZXJyKTtcbiAgICAgIH0gZmluYWxseSB7XG4gICAgICAgIF9pdGVyYXRvcjEzLmYoKTtcbiAgICAgIH1cbiAgICB9IC8vIFdoZW4gYSBmb2xkZXIgaXMgZHJvcHBlZCAob3IgZmlsZXMgYXJlIHBhc3RlZCksIGl0ZW1zIG11c3QgYmUgaGFuZGxlZFxuICAgIC8vIGluc3RlYWQgb2YgZmlsZXMuXG5cbiAgfSwge1xuICAgIGtleTogXCJfYWRkRmlsZXNGcm9tSXRlbXNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX2FkZEZpbGVzRnJvbUl0ZW1zKGl0ZW1zKSB7XG4gICAgICB2YXIgX3RoaXM1ID0gdGhpcztcblxuICAgICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIHJlc3VsdCA9IFtdO1xuXG4gICAgICAgIHZhciBfaXRlcmF0b3IxNCA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGl0ZW1zKSxcbiAgICAgICAgICAgIF9zdGVwMTQ7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjE0LnMoKTsgIShfc3RlcDE0ID0gX2l0ZXJhdG9yMTQubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIGl0ZW0gPSBfc3RlcDE0LnZhbHVlO1xuICAgICAgICAgICAgdmFyIGVudHJ5O1xuXG4gICAgICAgICAgICBpZiAoaXRlbS53ZWJraXRHZXRBc0VudHJ5ICE9IG51bGwgJiYgKGVudHJ5ID0gaXRlbS53ZWJraXRHZXRBc0VudHJ5KCkpKSB7XG4gICAgICAgICAgICAgIGlmIChlbnRyeS5pc0ZpbGUpIHtcbiAgICAgICAgICAgICAgICByZXN1bHQucHVzaChfdGhpczUuYWRkRmlsZShpdGVtLmdldEFzRmlsZSgpKSk7XG4gICAgICAgICAgICAgIH0gZWxzZSBpZiAoZW50cnkuaXNEaXJlY3RvcnkpIHtcbiAgICAgICAgICAgICAgICAvLyBBcHBlbmQgYWxsIGZpbGVzIGZyb20gdGhhdCBkaXJlY3RvcnkgdG8gZmlsZXNcbiAgICAgICAgICAgICAgICByZXN1bHQucHVzaChfdGhpczUuX2FkZEZpbGVzRnJvbURpcmVjdG9yeShlbnRyeSwgZW50cnkubmFtZSkpO1xuICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHJlc3VsdC5wdXNoKHVuZGVmaW5lZCk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSBpZiAoaXRlbS5nZXRBc0ZpbGUgIT0gbnVsbCkge1xuICAgICAgICAgICAgICBpZiAoaXRlbS5raW5kID09IG51bGwgfHwgaXRlbS5raW5kID09PSBcImZpbGVcIikge1xuICAgICAgICAgICAgICAgIHJlc3VsdC5wdXNoKF90aGlzNS5hZGRGaWxlKGl0ZW0uZ2V0QXNGaWxlKCkpKTtcbiAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICByZXN1bHQucHVzaCh1bmRlZmluZWQpO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICByZXN1bHQucHVzaCh1bmRlZmluZWQpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgIH1cbiAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMTQuZShlcnIpO1xuICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgIF9pdGVyYXRvcjE0LmYoKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgICB9KCk7XG4gICAgfSAvLyBHb2VzIHRocm91Z2ggdGhlIGRpcmVjdG9yeSwgYW5kIGFkZHMgZWFjaCBmaWxlIGl0IGZpbmRzIHJlY3Vyc2l2ZWx5XG5cbiAgfSwge1xuICAgIGtleTogXCJfYWRkRmlsZXNGcm9tRGlyZWN0b3J5XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9hZGRGaWxlc0Zyb21EaXJlY3RvcnkoZGlyZWN0b3J5LCBwYXRoKSB7XG4gICAgICB2YXIgX3RoaXM2ID0gdGhpcztcblxuICAgICAgdmFyIGRpclJlYWRlciA9IGRpcmVjdG9yeS5jcmVhdGVSZWFkZXIoKTtcblxuICAgICAgdmFyIGVycm9ySGFuZGxlciA9IGZ1bmN0aW9uIGVycm9ySGFuZGxlcihlcnJvcikge1xuICAgICAgICByZXR1cm4gX19ndWFyZE1ldGhvZF9fKGNvbnNvbGUsICdsb2cnLCBmdW5jdGlvbiAobykge1xuICAgICAgICAgIHJldHVybiBvLmxvZyhlcnJvcik7XG4gICAgICAgIH0pO1xuICAgICAgfTtcblxuICAgICAgdmFyIHJlYWRFbnRyaWVzID0gZnVuY3Rpb24gcmVhZEVudHJpZXMoKSB7XG4gICAgICAgIHJldHVybiBkaXJSZWFkZXIucmVhZEVudHJpZXMoZnVuY3Rpb24gKGVudHJpZXMpIHtcbiAgICAgICAgICBpZiAoZW50cmllcy5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICB2YXIgX2l0ZXJhdG9yMTUgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihlbnRyaWVzKSxcbiAgICAgICAgICAgICAgICBfc3RlcDE1O1xuXG4gICAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgICBmb3IgKF9pdGVyYXRvcjE1LnMoKTsgIShfc3RlcDE1ID0gX2l0ZXJhdG9yMTUubigpKS5kb25lOykge1xuICAgICAgICAgICAgICAgIHZhciBlbnRyeSA9IF9zdGVwMTUudmFsdWU7XG5cbiAgICAgICAgICAgICAgICBpZiAoZW50cnkuaXNGaWxlKSB7XG4gICAgICAgICAgICAgICAgICBlbnRyeS5maWxlKGZ1bmN0aW9uIChmaWxlKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmIChfdGhpczYub3B0aW9ucy5pZ25vcmVIaWRkZW5GaWxlcyAmJiBmaWxlLm5hbWUuc3Vic3RyaW5nKDAsIDEpID09PSAnLicpIHtcbiAgICAgICAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICBmaWxlLmZ1bGxQYXRoID0gXCJcIi5jb25jYXQocGF0aCwgXCIvXCIpLmNvbmNhdChmaWxlLm5hbWUpO1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4gX3RoaXM2LmFkZEZpbGUoZmlsZSk7XG4gICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKGVudHJ5LmlzRGlyZWN0b3J5KSB7XG4gICAgICAgICAgICAgICAgICBfdGhpczYuX2FkZEZpbGVzRnJvbURpcmVjdG9yeShlbnRyeSwgXCJcIi5jb25jYXQocGF0aCwgXCIvXCIpLmNvbmNhdChlbnRyeS5uYW1lKSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICB9IC8vIFJlY3Vyc2l2ZWx5IGNhbGwgcmVhZEVudHJpZXMoKSBhZ2Fpbiwgc2luY2UgYnJvd3NlciBvbmx5IGhhbmRsZVxuICAgICAgICAgICAgICAvLyB0aGUgZmlyc3QgMTAwIGVudHJpZXMuXG4gICAgICAgICAgICAgIC8vIFNlZTogaHR0cHM6Ly9kZXZlbG9wZXIubW96aWxsYS5vcmcvZW4tVVMvZG9jcy9XZWIvQVBJL0RpcmVjdG9yeVJlYWRlciNyZWFkRW50cmllc1xuXG4gICAgICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgICAgX2l0ZXJhdG9yMTUuZShlcnIpO1xuICAgICAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICAgICAgX2l0ZXJhdG9yMTUuZigpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICByZWFkRW50cmllcygpO1xuICAgICAgICAgIH1cblxuICAgICAgICAgIHJldHVybiBudWxsO1xuICAgICAgICB9LCBlcnJvckhhbmRsZXIpO1xuICAgICAgfTtcblxuICAgICAgcmV0dXJuIHJlYWRFbnRyaWVzKCk7XG4gICAgfSAvLyBJZiBgZG9uZSgpYCBpcyBjYWxsZWQgd2l0aG91dCBhcmd1bWVudCB0aGUgZmlsZSBpcyBhY2NlcHRlZFxuICAgIC8vIElmIHlvdSBjYWxsIGl0IHdpdGggYW4gZXJyb3IgbWVzc2FnZSwgdGhlIGZpbGUgaXMgcmVqZWN0ZWRcbiAgICAvLyAoVGhpcyBhbGxvd3MgZm9yIGFzeW5jaHJvbm91cyB2YWxpZGF0aW9uKVxuICAgIC8vXG4gICAgLy8gVGhpcyBmdW5jdGlvbiBjaGVja3MgdGhlIGZpbGVzaXplLCBhbmQgaWYgdGhlIGZpbGUudHlwZSBwYXNzZXMgdGhlXG4gICAgLy8gYGFjY2VwdGVkRmlsZXNgIGNoZWNrLlxuXG4gIH0sIHtcbiAgICBrZXk6IFwiYWNjZXB0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGFjY2VwdChmaWxlLCBkb25lKSB7XG4gICAgICBpZiAodGhpcy5vcHRpb25zLm1heEZpbGVzaXplICYmIGZpbGUuc2l6ZSA+IHRoaXMub3B0aW9ucy5tYXhGaWxlc2l6ZSAqIDEwMjQgKiAxMDI0KSB7XG4gICAgICAgIGRvbmUodGhpcy5vcHRpb25zLmRpY3RGaWxlVG9vQmlnLnJlcGxhY2UoXCJ7e2ZpbGVzaXplfX1cIiwgTWF0aC5yb3VuZChmaWxlLnNpemUgLyAxMDI0IC8gMTAuMjQpIC8gMTAwKS5yZXBsYWNlKFwie3ttYXhGaWxlc2l6ZX19XCIsIHRoaXMub3B0aW9ucy5tYXhGaWxlc2l6ZSkpO1xuICAgICAgfSBlbHNlIGlmICghRHJvcHpvbmUuaXNWYWxpZEZpbGUoZmlsZSwgdGhpcy5vcHRpb25zLmFjY2VwdGVkRmlsZXMpKSB7XG4gICAgICAgIGRvbmUodGhpcy5vcHRpb25zLmRpY3RJbnZhbGlkRmlsZVR5cGUpO1xuICAgICAgfSBlbHNlIGlmICh0aGlzLm9wdGlvbnMubWF4RmlsZXMgIT0gbnVsbCAmJiB0aGlzLmdldEFjY2VwdGVkRmlsZXMoKS5sZW5ndGggPj0gdGhpcy5vcHRpb25zLm1heEZpbGVzKSB7XG4gICAgICAgIGRvbmUodGhpcy5vcHRpb25zLmRpY3RNYXhGaWxlc0V4Y2VlZGVkLnJlcGxhY2UoXCJ7e21heEZpbGVzfX1cIiwgdGhpcy5vcHRpb25zLm1heEZpbGVzKSk7XG4gICAgICAgIHRoaXMuZW1pdChcIm1heGZpbGVzZXhjZWVkZWRcIiwgZmlsZSk7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB0aGlzLm9wdGlvbnMuYWNjZXB0LmNhbGwodGhpcywgZmlsZSwgZG9uZSk7XG4gICAgICB9XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImFkZEZpbGVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gYWRkRmlsZShmaWxlKSB7XG4gICAgICB2YXIgX3RoaXM3ID0gdGhpcztcblxuICAgICAgZmlsZS51cGxvYWQgPSB7XG4gICAgICAgIHV1aWQ6IERyb3B6b25lLnV1aWR2NCgpLFxuICAgICAgICBwcm9ncmVzczogMCxcbiAgICAgICAgLy8gU2V0dGluZyB0aGUgdG90YWwgdXBsb2FkIHNpemUgdG8gZmlsZS5zaXplIGZvciB0aGUgYmVnaW5uaW5nXG4gICAgICAgIC8vIEl0J3MgYWN0dWFsIGRpZmZlcmVudCB0aGFuIHRoZSBzaXplIHRvIGJlIHRyYW5zbWl0dGVkLlxuICAgICAgICB0b3RhbDogZmlsZS5zaXplLFxuICAgICAgICBieXRlc1NlbnQ6IDAsXG4gICAgICAgIGZpbGVuYW1lOiB0aGlzLl9yZW5hbWVGaWxlKGZpbGUpIC8vIE5vdCBzZXR0aW5nIGNodW5raW5nIGluZm9ybWF0aW9uIGhlcmUsIGJlY2F1c2UgdGhlIGFjdXRhbCBkYXRhIOKAlCBhbmRcbiAgICAgICAgLy8gdGh1cyB0aGUgY2h1bmtzIOKAlCBtaWdodCBjaGFuZ2UgaWYgYG9wdGlvbnMudHJhbnNmb3JtRmlsZWAgaXMgc2V0XG4gICAgICAgIC8vIGFuZCBkb2VzIHNvbWV0aGluZyB0byB0aGUgZGF0YS5cblxuICAgICAgfTtcbiAgICAgIHRoaXMuZmlsZXMucHVzaChmaWxlKTtcbiAgICAgIGZpbGUuc3RhdHVzID0gRHJvcHpvbmUuQURERUQ7XG4gICAgICB0aGlzLmVtaXQoXCJhZGRlZGZpbGVcIiwgZmlsZSk7XG5cbiAgICAgIHRoaXMuX2VucXVldWVUaHVtYm5haWwoZmlsZSk7XG5cbiAgICAgIHRoaXMuYWNjZXB0KGZpbGUsIGZ1bmN0aW9uIChlcnJvcikge1xuICAgICAgICBpZiAoZXJyb3IpIHtcbiAgICAgICAgICBmaWxlLmFjY2VwdGVkID0gZmFsc2U7XG5cbiAgICAgICAgICBfdGhpczcuX2Vycm9yUHJvY2Vzc2luZyhbZmlsZV0sIGVycm9yKTsgLy8gV2lsbCBzZXQgdGhlIGZpbGUuc3RhdHVzXG5cbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICBmaWxlLmFjY2VwdGVkID0gdHJ1ZTtcblxuICAgICAgICAgIGlmIChfdGhpczcub3B0aW9ucy5hdXRvUXVldWUpIHtcbiAgICAgICAgICAgIF90aGlzNy5lbnF1ZXVlRmlsZShmaWxlKTtcbiAgICAgICAgICB9IC8vIFdpbGwgc2V0IC5hY2NlcHRlZCA9IHRydWVcblxuICAgICAgICB9XG5cbiAgICAgICAgX3RoaXM3Ll91cGRhdGVNYXhGaWxlc1JlYWNoZWRDbGFzcygpO1xuICAgICAgfSk7XG4gICAgfSAvLyBXcmFwcGVyIGZvciBlbnF1ZXVlRmlsZVxuXG4gIH0sIHtcbiAgICBrZXk6IFwiZW5xdWV1ZUZpbGVzXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVucXVldWVGaWxlcyhmaWxlcykge1xuICAgICAgdmFyIF9pdGVyYXRvcjE2ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgIF9zdGVwMTY7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMTYucygpOyAhKF9zdGVwMTYgPSBfaXRlcmF0b3IxNi5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIGZpbGUgPSBfc3RlcDE2LnZhbHVlO1xuICAgICAgICAgIHRoaXMuZW5xdWV1ZUZpbGUoZmlsZSk7XG4gICAgICAgIH1cbiAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICBfaXRlcmF0b3IxNi5lKGVycik7XG4gICAgICB9IGZpbmFsbHkge1xuICAgICAgICBfaXRlcmF0b3IxNi5mKCk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBudWxsO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJlbnF1ZXVlRmlsZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBlbnF1ZXVlRmlsZShmaWxlKSB7XG4gICAgICB2YXIgX3RoaXM4ID0gdGhpcztcblxuICAgICAgaWYgKGZpbGUuc3RhdHVzID09PSBEcm9wem9uZS5BRERFRCAmJiBmaWxlLmFjY2VwdGVkID09PSB0cnVlKSB7XG4gICAgICAgIGZpbGUuc3RhdHVzID0gRHJvcHpvbmUuUVVFVUVEO1xuXG4gICAgICAgIGlmICh0aGlzLm9wdGlvbnMuYXV0b1Byb2Nlc3NRdWV1ZSkge1xuICAgICAgICAgIHJldHVybiBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIHJldHVybiBfdGhpczgucHJvY2Vzc1F1ZXVlKCk7XG4gICAgICAgICAgfSwgMCk7IC8vIERlZmVycmluZyB0aGUgY2FsbFxuICAgICAgICB9XG4gICAgICB9IGVsc2Uge1xuICAgICAgICB0aHJvdyBuZXcgRXJyb3IoXCJUaGlzIGZpbGUgY2FuJ3QgYmUgcXVldWVkIGJlY2F1c2UgaXQgaGFzIGFscmVhZHkgYmVlbiBwcm9jZXNzZWQgb3Igd2FzIHJlamVjdGVkLlwiKTtcbiAgICAgIH1cbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiX2VucXVldWVUaHVtYm5haWxcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX2VucXVldWVUaHVtYm5haWwoZmlsZSkge1xuICAgICAgdmFyIF90aGlzOSA9IHRoaXM7XG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMuY3JlYXRlSW1hZ2VUaHVtYm5haWxzICYmIGZpbGUudHlwZS5tYXRjaCgvaW1hZ2UuKi8pICYmIGZpbGUuc2l6ZSA8PSB0aGlzLm9wdGlvbnMubWF4VGh1bWJuYWlsRmlsZXNpemUgKiAxMDI0ICogMTAyNCkge1xuICAgICAgICB0aGlzLl90aHVtYm5haWxRdWV1ZS5wdXNoKGZpbGUpO1xuXG4gICAgICAgIHJldHVybiBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICByZXR1cm4gX3RoaXM5Ll9wcm9jZXNzVGh1bWJuYWlsUXVldWUoKTtcbiAgICAgICAgfSwgMCk7IC8vIERlZmVycmluZyB0aGUgY2FsbFxuICAgICAgfVxuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJfcHJvY2Vzc1RodW1ibmFpbFF1ZXVlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9wcm9jZXNzVGh1bWJuYWlsUXVldWUoKSB7XG4gICAgICB2YXIgX3RoaXMxMCA9IHRoaXM7XG5cbiAgICAgIGlmICh0aGlzLl9wcm9jZXNzaW5nVGh1bWJuYWlsIHx8IHRoaXMuX3RodW1ibmFpbFF1ZXVlLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIHRoaXMuX3Byb2Nlc3NpbmdUaHVtYm5haWwgPSB0cnVlO1xuXG4gICAgICB2YXIgZmlsZSA9IHRoaXMuX3RodW1ibmFpbFF1ZXVlLnNoaWZ0KCk7XG5cbiAgICAgIHJldHVybiB0aGlzLmNyZWF0ZVRodW1ibmFpbChmaWxlLCB0aGlzLm9wdGlvbnMudGh1bWJuYWlsV2lkdGgsIHRoaXMub3B0aW9ucy50aHVtYm5haWxIZWlnaHQsIHRoaXMub3B0aW9ucy50aHVtYm5haWxNZXRob2QsIHRydWUsIGZ1bmN0aW9uIChkYXRhVXJsKSB7XG4gICAgICAgIF90aGlzMTAuZW1pdChcInRodW1ibmFpbFwiLCBmaWxlLCBkYXRhVXJsKTtcblxuICAgICAgICBfdGhpczEwLl9wcm9jZXNzaW5nVGh1bWJuYWlsID0gZmFsc2U7XG4gICAgICAgIHJldHVybiBfdGhpczEwLl9wcm9jZXNzVGh1bWJuYWlsUXVldWUoKTtcbiAgICAgIH0pO1xuICAgIH0gLy8gQ2FuIGJlIGNhbGxlZCBieSB0aGUgdXNlciB0byByZW1vdmUgYSBmaWxlXG5cbiAgfSwge1xuICAgIGtleTogXCJyZW1vdmVGaWxlXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHJlbW92ZUZpbGUoZmlsZSkge1xuICAgICAgaWYgKGZpbGUuc3RhdHVzID09PSBEcm9wem9uZS5VUExPQURJTkcpIHtcbiAgICAgICAgdGhpcy5jYW5jZWxVcGxvYWQoZmlsZSk7XG4gICAgICB9XG5cbiAgICAgIHRoaXMuZmlsZXMgPSB3aXRob3V0KHRoaXMuZmlsZXMsIGZpbGUpO1xuICAgICAgdGhpcy5lbWl0KFwicmVtb3ZlZGZpbGVcIiwgZmlsZSk7XG5cbiAgICAgIGlmICh0aGlzLmZpbGVzLmxlbmd0aCA9PT0gMCkge1xuICAgICAgICByZXR1cm4gdGhpcy5lbWl0KFwicmVzZXRcIik7XG4gICAgICB9XG4gICAgfSAvLyBSZW1vdmVzIGFsbCBmaWxlcyB0aGF0IGFyZW4ndCBjdXJyZW50bHkgcHJvY2Vzc2VkIGZyb20gdGhlIGxpc3RcblxuICB9LCB7XG4gICAga2V5OiBcInJlbW92ZUFsbEZpbGVzXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHJlbW92ZUFsbEZpbGVzKGNhbmNlbElmTmVjZXNzYXJ5KSB7XG4gICAgICAvLyBDcmVhdGUgYSBjb3B5IG9mIGZpbGVzIHNpbmNlIHJlbW92ZUZpbGUoKSBjaGFuZ2VzIHRoZSBAZmlsZXMgYXJyYXkuXG4gICAgICBpZiAoY2FuY2VsSWZOZWNlc3NhcnkgPT0gbnVsbCkge1xuICAgICAgICBjYW5jZWxJZk5lY2Vzc2FyeSA9IGZhbHNlO1xuICAgICAgfVxuXG4gICAgICB2YXIgX2l0ZXJhdG9yMTcgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcih0aGlzLmZpbGVzLnNsaWNlKCkpLFxuICAgICAgICAgIF9zdGVwMTc7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMTcucygpOyAhKF9zdGVwMTcgPSBfaXRlcmF0b3IxNy5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIGZpbGUgPSBfc3RlcDE3LnZhbHVlO1xuXG4gICAgICAgICAgaWYgKGZpbGUuc3RhdHVzICE9PSBEcm9wem9uZS5VUExPQURJTkcgfHwgY2FuY2VsSWZOZWNlc3NhcnkpIHtcbiAgICAgICAgICAgIHRoaXMucmVtb3ZlRmlsZShmaWxlKTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICBfaXRlcmF0b3IxNy5lKGVycik7XG4gICAgICB9IGZpbmFsbHkge1xuICAgICAgICBfaXRlcmF0b3IxNy5mKCk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBudWxsO1xuICAgIH0gLy8gUmVzaXplcyBhbiBpbWFnZSBiZWZvcmUgaXQgZ2V0cyBzZW50IHRvIHRoZSBzZXJ2ZXIuIFRoaXMgZnVuY3Rpb24gaXMgdGhlIGRlZmF1bHQgYmVoYXZpb3Igb2ZcbiAgICAvLyBgb3B0aW9ucy50cmFuc2Zvcm1GaWxlYCBpZiBgcmVzaXplV2lkdGhgIG9yIGByZXNpemVIZWlnaHRgIGFyZSBzZXQuIFRoZSBjYWxsYmFjayBpcyBpbnZva2VkIHdpdGhcbiAgICAvLyB0aGUgcmVzaXplZCBibG9iLlxuXG4gIH0sIHtcbiAgICBrZXk6IFwicmVzaXplSW1hZ2VcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gcmVzaXplSW1hZ2UoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kLCBjYWxsYmFjaykge1xuICAgICAgdmFyIF90aGlzMTEgPSB0aGlzO1xuXG4gICAgICByZXR1cm4gdGhpcy5jcmVhdGVUaHVtYm5haWwoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kLCB0cnVlLCBmdW5jdGlvbiAoZGF0YVVybCwgY2FudmFzKSB7XG4gICAgICAgIGlmIChjYW52YXMgPT0gbnVsbCkge1xuICAgICAgICAgIC8vIFRoZSBpbWFnZSBoYXMgbm90IGJlZW4gcmVzaXplZFxuICAgICAgICAgIHJldHVybiBjYWxsYmFjayhmaWxlKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICB2YXIgcmVzaXplTWltZVR5cGUgPSBfdGhpczExLm9wdGlvbnMucmVzaXplTWltZVR5cGU7XG5cbiAgICAgICAgICBpZiAocmVzaXplTWltZVR5cGUgPT0gbnVsbCkge1xuICAgICAgICAgICAgcmVzaXplTWltZVR5cGUgPSBmaWxlLnR5cGU7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgdmFyIHJlc2l6ZWREYXRhVVJMID0gY2FudmFzLnRvRGF0YVVSTChyZXNpemVNaW1lVHlwZSwgX3RoaXMxMS5vcHRpb25zLnJlc2l6ZVF1YWxpdHkpO1xuXG4gICAgICAgICAgaWYgKHJlc2l6ZU1pbWVUeXBlID09PSAnaW1hZ2UvanBlZycgfHwgcmVzaXplTWltZVR5cGUgPT09ICdpbWFnZS9qcGcnKSB7XG4gICAgICAgICAgICAvLyBOb3cgYWRkIHRoZSBvcmlnaW5hbCBFWElGIGluZm9ybWF0aW9uXG4gICAgICAgICAgICByZXNpemVkRGF0YVVSTCA9IEV4aWZSZXN0b3JlLnJlc3RvcmUoZmlsZS5kYXRhVVJMLCByZXNpemVkRGF0YVVSTCk7XG4gICAgICAgICAgfVxuXG4gICAgICAgICAgcmV0dXJuIGNhbGxiYWNrKERyb3B6b25lLmRhdGFVUkl0b0Jsb2IocmVzaXplZERhdGFVUkwpKTtcbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImNyZWF0ZVRodW1ibmFpbFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBjcmVhdGVUaHVtYm5haWwoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kLCBmaXhPcmllbnRhdGlvbiwgY2FsbGJhY2spIHtcbiAgICAgIHZhciBfdGhpczEyID0gdGhpcztcblxuICAgICAgdmFyIGZpbGVSZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuXG4gICAgICBmaWxlUmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgZmlsZS5kYXRhVVJMID0gZmlsZVJlYWRlci5yZXN1bHQ7IC8vIERvbid0IGJvdGhlciBjcmVhdGluZyBhIHRodW1ibmFpbCBmb3IgU1ZHIGltYWdlcyBzaW5jZSB0aGV5J3JlIHZlY3RvclxuXG4gICAgICAgIGlmIChmaWxlLnR5cGUgPT09IFwiaW1hZ2Uvc3ZnK3htbFwiKSB7XG4gICAgICAgICAgaWYgKGNhbGxiYWNrICE9IG51bGwpIHtcbiAgICAgICAgICAgIGNhbGxiYWNrKGZpbGVSZWFkZXIucmVzdWx0KTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBfdGhpczEyLmNyZWF0ZVRodW1ibmFpbEZyb21VcmwoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kLCBmaXhPcmllbnRhdGlvbiwgY2FsbGJhY2spO1xuICAgICAgfTtcblxuICAgICAgZmlsZVJlYWRlci5yZWFkQXNEYXRhVVJMKGZpbGUpO1xuICAgIH0gLy8gYG1vY2tGaWxlYCBuZWVkcyB0byBoYXZlIHRoZXNlIGF0dHJpYnV0ZXM6XG4gICAgLy8gXG4gICAgLy8gICAgIHsgbmFtZTogJ25hbWUnLCBzaXplOiAxMjM0NSwgaW1hZ2VVcmw6ICcnIH1cbiAgICAvL1xuICAgIC8vIGBjYWxsYmFja2Agd2lsbCBiZSBpbnZva2VkIHdoZW4gdGhlIGltYWdlIGhhcyBiZWVuIGRvd25sb2FkZWQgYW5kIGRpc3BsYXllZC5cbiAgICAvLyBgY3Jvc3NPcmlnaW5gIHdpbGwgYmUgYWRkZWQgdG8gdGhlIGBpbWdgIHRhZyB3aGVuIGFjY2Vzc2luZyB0aGUgZmlsZS5cblxuICB9LCB7XG4gICAga2V5OiBcImRpc3BsYXlFeGlzdGluZ0ZpbGVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZGlzcGxheUV4aXN0aW5nRmlsZShtb2NrRmlsZSwgaW1hZ2VVcmwsIGNhbGxiYWNrLCBjcm9zc09yaWdpbikge1xuICAgICAgdmFyIF90aGlzMTMgPSB0aGlzO1xuXG4gICAgICB2YXIgcmVzaXplVGh1bWJuYWlsID0gYXJndW1lbnRzLmxlbmd0aCA+IDQgJiYgYXJndW1lbnRzWzRdICE9PSB1bmRlZmluZWQgPyBhcmd1bWVudHNbNF0gOiB0cnVlO1xuICAgICAgdGhpcy5lbWl0KFwiYWRkZWRmaWxlXCIsIG1vY2tGaWxlKTtcbiAgICAgIHRoaXMuZW1pdChcImNvbXBsZXRlXCIsIG1vY2tGaWxlKTtcblxuICAgICAgaWYgKCFyZXNpemVUaHVtYm5haWwpIHtcbiAgICAgICAgdGhpcy5lbWl0KFwidGh1bWJuYWlsXCIsIG1vY2tGaWxlLCBpbWFnZVVybCk7XG4gICAgICAgIGlmIChjYWxsYmFjaykgY2FsbGJhY2soKTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIHZhciBvbkRvbmUgPSBmdW5jdGlvbiBvbkRvbmUodGh1bWJuYWlsKSB7XG4gICAgICAgICAgX3RoaXMxMy5lbWl0KCd0aHVtYm5haWwnLCBtb2NrRmlsZSwgdGh1bWJuYWlsKTtcblxuICAgICAgICAgIGlmIChjYWxsYmFjaykgY2FsbGJhY2soKTtcbiAgICAgICAgfTtcblxuICAgICAgICBtb2NrRmlsZS5kYXRhVVJMID0gaW1hZ2VVcmw7XG4gICAgICAgIHRoaXMuY3JlYXRlVGh1bWJuYWlsRnJvbVVybChtb2NrRmlsZSwgdGhpcy5vcHRpb25zLnRodW1ibmFpbFdpZHRoLCB0aGlzLm9wdGlvbnMudGh1bWJuYWlsSGVpZ2h0LCB0aGlzLm9wdGlvbnMucmVzaXplTWV0aG9kLCB0aGlzLm9wdGlvbnMuZml4T3JpZW50YXRpb24sIG9uRG9uZSwgY3Jvc3NPcmlnaW4pO1xuICAgICAgfVxuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJjcmVhdGVUaHVtYm5haWxGcm9tVXJsXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNyZWF0ZVRodW1ibmFpbEZyb21VcmwoZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kLCBmaXhPcmllbnRhdGlvbiwgY2FsbGJhY2ssIGNyb3NzT3JpZ2luKSB7XG4gICAgICB2YXIgX3RoaXMxNCA9IHRoaXM7XG5cbiAgICAgIC8vIE5vdCB1c2luZyBgbmV3IEltYWdlYCBoZXJlIGJlY2F1c2Ugb2YgYSBidWcgaW4gbGF0ZXN0IENocm9tZSB2ZXJzaW9ucy5cbiAgICAgIC8vIFNlZSBodHRwczovL2dpdGh1Yi5jb20vZW55by9kcm9wem9uZS9wdWxsLzIyNlxuICAgICAgdmFyIGltZyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJpbWdcIik7XG5cbiAgICAgIGlmIChjcm9zc09yaWdpbikge1xuICAgICAgICBpbWcuY3Jvc3NPcmlnaW4gPSBjcm9zc09yaWdpbjtcbiAgICAgIH0gLy8gZml4T3JpZW50YXRpb24gaXMgbm90IG5lZWRlZCBhbnltb3JlIHdpdGggYnJvd3NlcnMgaGFuZGxpbmcgaW1hZ2VPcmllbnRhdGlvblxuXG5cbiAgICAgIGZpeE9yaWVudGF0aW9uID0gZ2V0Q29tcHV0ZWRTdHlsZShkb2N1bWVudC5ib2R5KVsnaW1hZ2VPcmllbnRhdGlvbiddID09ICdmcm9tLWltYWdlJyA/IGZhbHNlIDogZml4T3JpZW50YXRpb247XG5cbiAgICAgIGltZy5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBsb2FkRXhpZiA9IGZ1bmN0aW9uIGxvYWRFeGlmKGNhbGxiYWNrKSB7XG4gICAgICAgICAgcmV0dXJuIGNhbGxiYWNrKDEpO1xuICAgICAgICB9O1xuXG4gICAgICAgIGlmICh0eXBlb2YgRVhJRiAhPT0gJ3VuZGVmaW5lZCcgJiYgRVhJRiAhPT0gbnVsbCAmJiBmaXhPcmllbnRhdGlvbikge1xuICAgICAgICAgIGxvYWRFeGlmID0gZnVuY3Rpb24gbG9hZEV4aWYoY2FsbGJhY2spIHtcbiAgICAgICAgICAgIHJldHVybiBFWElGLmdldERhdGEoaW1nLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgIHJldHVybiBjYWxsYmFjayhFWElGLmdldFRhZyh0aGlzLCAnT3JpZW50YXRpb24nKSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9O1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIGxvYWRFeGlmKGZ1bmN0aW9uIChvcmllbnRhdGlvbikge1xuICAgICAgICAgIGZpbGUud2lkdGggPSBpbWcud2lkdGg7XG4gICAgICAgICAgZmlsZS5oZWlnaHQgPSBpbWcuaGVpZ2h0O1xuXG4gICAgICAgICAgdmFyIHJlc2l6ZUluZm8gPSBfdGhpczE0Lm9wdGlvbnMucmVzaXplLmNhbGwoX3RoaXMxNCwgZmlsZSwgd2lkdGgsIGhlaWdodCwgcmVzaXplTWV0aG9kKTtcblxuICAgICAgICAgIHZhciBjYW52YXMgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiY2FudmFzXCIpO1xuICAgICAgICAgIHZhciBjdHggPSBjYW52YXMuZ2V0Q29udGV4dChcIjJkXCIpO1xuICAgICAgICAgIGNhbnZhcy53aWR0aCA9IHJlc2l6ZUluZm8udHJnV2lkdGg7XG4gICAgICAgICAgY2FudmFzLmhlaWdodCA9IHJlc2l6ZUluZm8udHJnSGVpZ2h0O1xuXG4gICAgICAgICAgaWYgKG9yaWVudGF0aW9uID4gNCkge1xuICAgICAgICAgICAgY2FudmFzLndpZHRoID0gcmVzaXplSW5mby50cmdIZWlnaHQ7XG4gICAgICAgICAgICBjYW52YXMuaGVpZ2h0ID0gcmVzaXplSW5mby50cmdXaWR0aDtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBzd2l0Y2ggKG9yaWVudGF0aW9uKSB7XG4gICAgICAgICAgICBjYXNlIDI6XG4gICAgICAgICAgICAgIC8vIGhvcml6b250YWwgZmxpcFxuICAgICAgICAgICAgICBjdHgudHJhbnNsYXRlKGNhbnZhcy53aWR0aCwgMCk7XG4gICAgICAgICAgICAgIGN0eC5zY2FsZSgtMSwgMSk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBjYXNlIDM6XG4gICAgICAgICAgICAgIC8vIDE4MMKwIHJvdGF0ZSBsZWZ0XG4gICAgICAgICAgICAgIGN0eC50cmFuc2xhdGUoY2FudmFzLndpZHRoLCBjYW52YXMuaGVpZ2h0KTtcbiAgICAgICAgICAgICAgY3R4LnJvdGF0ZShNYXRoLlBJKTtcbiAgICAgICAgICAgICAgYnJlYWs7XG5cbiAgICAgICAgICAgIGNhc2UgNDpcbiAgICAgICAgICAgICAgLy8gdmVydGljYWwgZmxpcFxuICAgICAgICAgICAgICBjdHgudHJhbnNsYXRlKDAsIGNhbnZhcy5oZWlnaHQpO1xuICAgICAgICAgICAgICBjdHguc2NhbGUoMSwgLTEpO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgY2FzZSA1OlxuICAgICAgICAgICAgICAvLyB2ZXJ0aWNhbCBmbGlwICsgOTAgcm90YXRlIHJpZ2h0XG4gICAgICAgICAgICAgIGN0eC5yb3RhdGUoMC41ICogTWF0aC5QSSk7XG4gICAgICAgICAgICAgIGN0eC5zY2FsZSgxLCAtMSk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBjYXNlIDY6XG4gICAgICAgICAgICAgIC8vIDkwwrAgcm90YXRlIHJpZ2h0XG4gICAgICAgICAgICAgIGN0eC5yb3RhdGUoMC41ICogTWF0aC5QSSk7XG4gICAgICAgICAgICAgIGN0eC50cmFuc2xhdGUoMCwgLWNhbnZhcy53aWR0aCk7XG4gICAgICAgICAgICAgIGJyZWFrO1xuXG4gICAgICAgICAgICBjYXNlIDc6XG4gICAgICAgICAgICAgIC8vIGhvcml6b250YWwgZmxpcCArIDkwIHJvdGF0ZSByaWdodFxuICAgICAgICAgICAgICBjdHgucm90YXRlKDAuNSAqIE1hdGguUEkpO1xuICAgICAgICAgICAgICBjdHgudHJhbnNsYXRlKGNhbnZhcy5oZWlnaHQsIC1jYW52YXMud2lkdGgpO1xuICAgICAgICAgICAgICBjdHguc2NhbGUoLTEsIDEpO1xuICAgICAgICAgICAgICBicmVhaztcblxuICAgICAgICAgICAgY2FzZSA4OlxuICAgICAgICAgICAgICAvLyA5MMKwIHJvdGF0ZSBsZWZ0XG4gICAgICAgICAgICAgIGN0eC5yb3RhdGUoLTAuNSAqIE1hdGguUEkpO1xuICAgICAgICAgICAgICBjdHgudHJhbnNsYXRlKC1jYW52YXMuaGVpZ2h0LCAwKTtcbiAgICAgICAgICAgICAgYnJlYWs7XG4gICAgICAgICAgfSAvLyBUaGlzIGlzIGEgYnVnZml4IGZvciBpT1MnIHNjYWxpbmcgYnVnLlxuXG5cbiAgICAgICAgICBkcmF3SW1hZ2VJT1NGaXgoY3R4LCBpbWcsIHJlc2l6ZUluZm8uc3JjWCAhPSBudWxsID8gcmVzaXplSW5mby5zcmNYIDogMCwgcmVzaXplSW5mby5zcmNZICE9IG51bGwgPyByZXNpemVJbmZvLnNyY1kgOiAwLCByZXNpemVJbmZvLnNyY1dpZHRoLCByZXNpemVJbmZvLnNyY0hlaWdodCwgcmVzaXplSW5mby50cmdYICE9IG51bGwgPyByZXNpemVJbmZvLnRyZ1ggOiAwLCByZXNpemVJbmZvLnRyZ1kgIT0gbnVsbCA/IHJlc2l6ZUluZm8udHJnWSA6IDAsIHJlc2l6ZUluZm8udHJnV2lkdGgsIHJlc2l6ZUluZm8udHJnSGVpZ2h0KTtcbiAgICAgICAgICB2YXIgdGh1bWJuYWlsID0gY2FudmFzLnRvRGF0YVVSTChcImltYWdlL3BuZ1wiKTtcblxuICAgICAgICAgIGlmIChjYWxsYmFjayAhPSBudWxsKSB7XG4gICAgICAgICAgICByZXR1cm4gY2FsbGJhY2sodGh1bWJuYWlsLCBjYW52YXMpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICB9O1xuXG4gICAgICBpZiAoY2FsbGJhY2sgIT0gbnVsbCkge1xuICAgICAgICBpbWcub25lcnJvciA9IGNhbGxiYWNrO1xuICAgICAgfVxuXG4gICAgICByZXR1cm4gaW1nLnNyYyA9IGZpbGUuZGF0YVVSTDtcbiAgICB9IC8vIEdvZXMgdGhyb3VnaCB0aGUgcXVldWUgYW5kIHByb2Nlc3NlcyBmaWxlcyBpZiB0aGVyZSBhcmVuJ3QgdG9vIG1hbnkgYWxyZWFkeS5cblxuICB9LCB7XG4gICAga2V5OiBcInByb2Nlc3NRdWV1ZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBwcm9jZXNzUXVldWUoKSB7XG4gICAgICB2YXIgcGFyYWxsZWxVcGxvYWRzID0gdGhpcy5vcHRpb25zLnBhcmFsbGVsVXBsb2FkcztcbiAgICAgIHZhciBwcm9jZXNzaW5nTGVuZ3RoID0gdGhpcy5nZXRVcGxvYWRpbmdGaWxlcygpLmxlbmd0aDtcbiAgICAgIHZhciBpID0gcHJvY2Vzc2luZ0xlbmd0aDsgLy8gVGhlcmUgYXJlIGFscmVhZHkgYXQgbGVhc3QgYXMgbWFueSBmaWxlcyB1cGxvYWRpbmcgdGhhbiBzaG91bGQgYmVcblxuICAgICAgaWYgKHByb2Nlc3NpbmdMZW5ndGggPj0gcGFyYWxsZWxVcGxvYWRzKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgdmFyIHF1ZXVlZEZpbGVzID0gdGhpcy5nZXRRdWV1ZWRGaWxlcygpO1xuXG4gICAgICBpZiAoIShxdWV1ZWRGaWxlcy5sZW5ndGggPiAwKSkge1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMudXBsb2FkTXVsdGlwbGUpIHtcbiAgICAgICAgLy8gVGhlIGZpbGVzIHNob3VsZCBiZSB1cGxvYWRlZCBpbiBvbmUgcmVxdWVzdFxuICAgICAgICByZXR1cm4gdGhpcy5wcm9jZXNzRmlsZXMocXVldWVkRmlsZXMuc2xpY2UoMCwgcGFyYWxsZWxVcGxvYWRzIC0gcHJvY2Vzc2luZ0xlbmd0aCkpO1xuICAgICAgfSBlbHNlIHtcbiAgICAgICAgd2hpbGUgKGkgPCBwYXJhbGxlbFVwbG9hZHMpIHtcbiAgICAgICAgICBpZiAoIXF1ZXVlZEZpbGVzLmxlbmd0aCkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgIH0gLy8gTm90aGluZyBsZWZ0IHRvIHByb2Nlc3NcblxuXG4gICAgICAgICAgdGhpcy5wcm9jZXNzRmlsZShxdWV1ZWRGaWxlcy5zaGlmdCgpKTtcbiAgICAgICAgICBpKys7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9IC8vIFdyYXBwZXIgZm9yIGBwcm9jZXNzRmlsZXNgXG5cbiAgfSwge1xuICAgIGtleTogXCJwcm9jZXNzRmlsZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBwcm9jZXNzRmlsZShmaWxlKSB7XG4gICAgICByZXR1cm4gdGhpcy5wcm9jZXNzRmlsZXMoW2ZpbGVdKTtcbiAgICB9IC8vIExvYWRzIHRoZSBmaWxlLCB0aGVuIGNhbGxzIGZpbmlzaGVkTG9hZGluZygpXG5cbiAgfSwge1xuICAgIGtleTogXCJwcm9jZXNzRmlsZXNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gcHJvY2Vzc0ZpbGVzKGZpbGVzKSB7XG4gICAgICB2YXIgX2l0ZXJhdG9yMTggPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihmaWxlcyksXG4gICAgICAgICAgX3N0ZXAxODtcblxuICAgICAgdHJ5IHtcbiAgICAgICAgZm9yIChfaXRlcmF0b3IxOC5zKCk7ICEoX3N0ZXAxOCA9IF9pdGVyYXRvcjE4Lm4oKSkuZG9uZTspIHtcbiAgICAgICAgICB2YXIgZmlsZSA9IF9zdGVwMTgudmFsdWU7XG4gICAgICAgICAgZmlsZS5wcm9jZXNzaW5nID0gdHJ1ZTsgLy8gQmFja3dhcmRzIGNvbXBhdGliaWxpdHlcblxuICAgICAgICAgIGZpbGUuc3RhdHVzID0gRHJvcHpvbmUuVVBMT0FESU5HO1xuICAgICAgICAgIHRoaXMuZW1pdChcInByb2Nlc3NpbmdcIiwgZmlsZSk7XG4gICAgICAgIH1cbiAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICBfaXRlcmF0b3IxOC5lKGVycik7XG4gICAgICB9IGZpbmFsbHkge1xuICAgICAgICBfaXRlcmF0b3IxOC5mKCk7XG4gICAgICB9XG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMudXBsb2FkTXVsdGlwbGUpIHtcbiAgICAgICAgdGhpcy5lbWl0KFwicHJvY2Vzc2luZ211bHRpcGxlXCIsIGZpbGVzKTtcbiAgICAgIH1cblxuICAgICAgcmV0dXJuIHRoaXMudXBsb2FkRmlsZXMoZmlsZXMpO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJfZ2V0RmlsZXNXaXRoWGhyXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9nZXRGaWxlc1dpdGhYaHIoeGhyKSB7XG4gICAgICB2YXIgZmlsZXM7XG4gICAgICByZXR1cm4gZmlsZXMgPSB0aGlzLmZpbGVzLmZpbHRlcihmdW5jdGlvbiAoZmlsZSkge1xuICAgICAgICByZXR1cm4gZmlsZS54aHIgPT09IHhocjtcbiAgICAgIH0pLm1hcChmdW5jdGlvbiAoZmlsZSkge1xuICAgICAgICByZXR1cm4gZmlsZTtcbiAgICAgIH0pO1xuICAgIH0gLy8gQ2FuY2VscyB0aGUgZmlsZSB1cGxvYWQgYW5kIHNldHMgdGhlIHN0YXR1cyB0byBDQU5DRUxFRFxuICAgIC8vICoqaWYqKiB0aGUgZmlsZSBpcyBhY3R1YWxseSBiZWluZyB1cGxvYWRlZC5cbiAgICAvLyBJZiBpdCdzIHN0aWxsIGluIHRoZSBxdWV1ZSwgdGhlIGZpbGUgaXMgYmVpbmcgcmVtb3ZlZCBmcm9tIGl0IGFuZCB0aGUgc3RhdHVzXG4gICAgLy8gc2V0IHRvIENBTkNFTEVELlxuXG4gIH0sIHtcbiAgICBrZXk6IFwiY2FuY2VsVXBsb2FkXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGNhbmNlbFVwbG9hZChmaWxlKSB7XG4gICAgICBpZiAoZmlsZS5zdGF0dXMgPT09IERyb3B6b25lLlVQTE9BRElORykge1xuICAgICAgICB2YXIgZ3JvdXBlZEZpbGVzID0gdGhpcy5fZ2V0RmlsZXNXaXRoWGhyKGZpbGUueGhyKTtcblxuICAgICAgICB2YXIgX2l0ZXJhdG9yMTkgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihncm91cGVkRmlsZXMpLFxuICAgICAgICAgICAgX3N0ZXAxOTtcblxuICAgICAgICB0cnkge1xuICAgICAgICAgIGZvciAoX2l0ZXJhdG9yMTkucygpOyAhKF9zdGVwMTkgPSBfaXRlcmF0b3IxOS5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgICB2YXIgZ3JvdXBlZEZpbGUgPSBfc3RlcDE5LnZhbHVlO1xuICAgICAgICAgICAgZ3JvdXBlZEZpbGUuc3RhdHVzID0gRHJvcHpvbmUuQ0FOQ0VMRUQ7XG4gICAgICAgICAgfVxuICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICBfaXRlcmF0b3IxOS5lKGVycik7XG4gICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMTkuZigpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKHR5cGVvZiBmaWxlLnhociAhPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICBmaWxlLnhoci5hYm9ydCgpO1xuICAgICAgICB9XG5cbiAgICAgICAgdmFyIF9pdGVyYXRvcjIwID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZ3JvdXBlZEZpbGVzKSxcbiAgICAgICAgICAgIF9zdGVwMjA7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjIwLnMoKTsgIShfc3RlcDIwID0gX2l0ZXJhdG9yMjAubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIF9ncm91cGVkRmlsZSA9IF9zdGVwMjAudmFsdWU7XG4gICAgICAgICAgICB0aGlzLmVtaXQoXCJjYW5jZWxlZFwiLCBfZ3JvdXBlZEZpbGUpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMjAuZShlcnIpO1xuICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgIF9pdGVyYXRvcjIwLmYoKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmICh0aGlzLm9wdGlvbnMudXBsb2FkTXVsdGlwbGUpIHtcbiAgICAgICAgICB0aGlzLmVtaXQoXCJjYW5jZWxlZG11bHRpcGxlXCIsIGdyb3VwZWRGaWxlcyk7XG4gICAgICAgIH1cbiAgICAgIH0gZWxzZSBpZiAoZmlsZS5zdGF0dXMgPT09IERyb3B6b25lLkFEREVEIHx8IGZpbGUuc3RhdHVzID09PSBEcm9wem9uZS5RVUVVRUQpIHtcbiAgICAgICAgZmlsZS5zdGF0dXMgPSBEcm9wem9uZS5DQU5DRUxFRDtcbiAgICAgICAgdGhpcy5lbWl0KFwiY2FuY2VsZWRcIiwgZmlsZSk7XG5cbiAgICAgICAgaWYgKHRoaXMub3B0aW9ucy51cGxvYWRNdWx0aXBsZSkge1xuICAgICAgICAgIHRoaXMuZW1pdChcImNhbmNlbGVkbXVsdGlwbGVcIiwgW2ZpbGVdKTtcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICBpZiAodGhpcy5vcHRpb25zLmF1dG9Qcm9jZXNzUXVldWUpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMucHJvY2Vzc1F1ZXVlKCk7XG4gICAgICB9XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcInJlc29sdmVPcHRpb25cIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gcmVzb2x2ZU9wdGlvbihvcHRpb24pIHtcbiAgICAgIGlmICh0eXBlb2Ygb3B0aW9uID09PSAnZnVuY3Rpb24nKSB7XG4gICAgICAgIGZvciAodmFyIF9sZW4zID0gYXJndW1lbnRzLmxlbmd0aCwgYXJncyA9IG5ldyBBcnJheShfbGVuMyA+IDEgPyBfbGVuMyAtIDEgOiAwKSwgX2tleTMgPSAxOyBfa2V5MyA8IF9sZW4zOyBfa2V5MysrKSB7XG4gICAgICAgICAgYXJnc1tfa2V5MyAtIDFdID0gYXJndW1lbnRzW19rZXkzXTtcbiAgICAgICAgfVxuXG4gICAgICAgIHJldHVybiBvcHRpb24uYXBwbHkodGhpcywgYXJncyk7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBvcHRpb247XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcInVwbG9hZEZpbGVcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gdXBsb2FkRmlsZShmaWxlKSB7XG4gICAgICByZXR1cm4gdGhpcy51cGxvYWRGaWxlcyhbZmlsZV0pO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJ1cGxvYWRGaWxlc1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1cGxvYWRGaWxlcyhmaWxlcykge1xuICAgICAgdmFyIF90aGlzMTUgPSB0aGlzO1xuXG4gICAgICB0aGlzLl90cmFuc2Zvcm1GaWxlcyhmaWxlcywgZnVuY3Rpb24gKHRyYW5zZm9ybWVkRmlsZXMpIHtcbiAgICAgICAgaWYgKF90aGlzMTUub3B0aW9ucy5jaHVua2luZykge1xuICAgICAgICAgIC8vIENodW5raW5nIGlzIG5vdCBhbGxvd2VkIHRvIGJlIHVzZWQgd2l0aCBgdXBsb2FkTXVsdGlwbGVgIHNvIHdlIGtub3dcbiAgICAgICAgICAvLyB0aGF0IHRoZXJlIGlzIG9ubHkgX19vbmVfX2ZpbGUuXG4gICAgICAgICAgdmFyIHRyYW5zZm9ybWVkRmlsZSA9IHRyYW5zZm9ybWVkRmlsZXNbMF07XG4gICAgICAgICAgZmlsZXNbMF0udXBsb2FkLmNodW5rZWQgPSBfdGhpczE1Lm9wdGlvbnMuY2h1bmtpbmcgJiYgKF90aGlzMTUub3B0aW9ucy5mb3JjZUNodW5raW5nIHx8IHRyYW5zZm9ybWVkRmlsZS5zaXplID4gX3RoaXMxNS5vcHRpb25zLmNodW5rU2l6ZSk7XG4gICAgICAgICAgZmlsZXNbMF0udXBsb2FkLnRvdGFsQ2h1bmtDb3VudCA9IE1hdGguY2VpbCh0cmFuc2Zvcm1lZEZpbGUuc2l6ZSAvIF90aGlzMTUub3B0aW9ucy5jaHVua1NpemUpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKGZpbGVzWzBdLnVwbG9hZC5jaHVua2VkKSB7XG4gICAgICAgICAgLy8gVGhpcyBmaWxlIHNob3VsZCBiZSBzZW50IGluIGNodW5rcyFcbiAgICAgICAgICAvLyBJZiB0aGUgY2h1bmtpbmcgb3B0aW9uIGlzIHNldCwgd2UgKiprbm93KiogdGhhdCB0aGVyZSBjYW4gb25seSBiZSAqKm9uZSoqIGZpbGUsIHNpbmNlXG4gICAgICAgICAgLy8gdXBsb2FkTXVsdGlwbGUgaXMgbm90IGFsbG93ZWQgd2l0aCB0aGlzIG9wdGlvbi5cbiAgICAgICAgICB2YXIgZmlsZSA9IGZpbGVzWzBdO1xuICAgICAgICAgIHZhciBfdHJhbnNmb3JtZWRGaWxlID0gdHJhbnNmb3JtZWRGaWxlc1swXTtcbiAgICAgICAgICB2YXIgc3RhcnRlZENodW5rQ291bnQgPSAwO1xuICAgICAgICAgIGZpbGUudXBsb2FkLmNodW5rcyA9IFtdO1xuXG4gICAgICAgICAgdmFyIGhhbmRsZU5leHRDaHVuayA9IGZ1bmN0aW9uIGhhbmRsZU5leHRDaHVuaygpIHtcbiAgICAgICAgICAgIHZhciBjaHVua0luZGV4ID0gMDsgLy8gRmluZCB0aGUgbmV4dCBpdGVtIGluIGZpbGUudXBsb2FkLmNodW5rcyB0aGF0IGlzIG5vdCBkZWZpbmVkIHlldC5cblxuICAgICAgICAgICAgd2hpbGUgKGZpbGUudXBsb2FkLmNodW5rc1tjaHVua0luZGV4XSAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgIGNodW5rSW5kZXgrKztcbiAgICAgICAgICAgIH0gLy8gVGhpcyBtZWFucywgdGhhdCBhbGwgY2h1bmtzIGhhdmUgYWxyZWFkeSBiZWVuIHN0YXJ0ZWQuXG5cblxuICAgICAgICAgICAgaWYgKGNodW5rSW5kZXggPj0gZmlsZS51cGxvYWQudG90YWxDaHVua0NvdW50KSByZXR1cm47XG4gICAgICAgICAgICBzdGFydGVkQ2h1bmtDb3VudCsrO1xuICAgICAgICAgICAgdmFyIHN0YXJ0ID0gY2h1bmtJbmRleCAqIF90aGlzMTUub3B0aW9ucy5jaHVua1NpemU7XG4gICAgICAgICAgICB2YXIgZW5kID0gTWF0aC5taW4oc3RhcnQgKyBfdGhpczE1Lm9wdGlvbnMuY2h1bmtTaXplLCBfdHJhbnNmb3JtZWRGaWxlLnNpemUpO1xuICAgICAgICAgICAgdmFyIGRhdGFCbG9jayA9IHtcbiAgICAgICAgICAgICAgbmFtZTogX3RoaXMxNS5fZ2V0UGFyYW1OYW1lKDApLFxuICAgICAgICAgICAgICBkYXRhOiBfdHJhbnNmb3JtZWRGaWxlLndlYmtpdFNsaWNlID8gX3RyYW5zZm9ybWVkRmlsZS53ZWJraXRTbGljZShzdGFydCwgZW5kKSA6IF90cmFuc2Zvcm1lZEZpbGUuc2xpY2Uoc3RhcnQsIGVuZCksXG4gICAgICAgICAgICAgIGZpbGVuYW1lOiBmaWxlLnVwbG9hZC5maWxlbmFtZSxcbiAgICAgICAgICAgICAgY2h1bmtJbmRleDogY2h1bmtJbmRleFxuICAgICAgICAgICAgfTtcbiAgICAgICAgICAgIGZpbGUudXBsb2FkLmNodW5rc1tjaHVua0luZGV4XSA9IHtcbiAgICAgICAgICAgICAgZmlsZTogZmlsZSxcbiAgICAgICAgICAgICAgaW5kZXg6IGNodW5rSW5kZXgsXG4gICAgICAgICAgICAgIGRhdGFCbG9jazogZGF0YUJsb2NrLFxuICAgICAgICAgICAgICAvLyBJbiBjYXNlIHdlIHdhbnQgdG8gcmV0cnkuXG4gICAgICAgICAgICAgIHN0YXR1czogRHJvcHpvbmUuVVBMT0FESU5HLFxuICAgICAgICAgICAgICBwcm9ncmVzczogMCxcbiAgICAgICAgICAgICAgcmV0cmllczogMCAvLyBUaGUgbnVtYmVyIG9mIHRpbWVzIHRoaXMgYmxvY2sgaGFzIGJlZW4gcmV0cmllZC5cblxuICAgICAgICAgICAgfTtcblxuICAgICAgICAgICAgX3RoaXMxNS5fdXBsb2FkRGF0YShmaWxlcywgW2RhdGFCbG9ja10pO1xuICAgICAgICAgIH07XG5cbiAgICAgICAgICBmaWxlLnVwbG9hZC5maW5pc2hlZENodW5rVXBsb2FkID0gZnVuY3Rpb24gKGNodW5rKSB7XG4gICAgICAgICAgICB2YXIgYWxsRmluaXNoZWQgPSB0cnVlO1xuICAgICAgICAgICAgY2h1bmsuc3RhdHVzID0gRHJvcHpvbmUuU1VDQ0VTUzsgLy8gQ2xlYXIgdGhlIGRhdGEgZnJvbSB0aGUgY2h1bmtcblxuICAgICAgICAgICAgY2h1bmsuZGF0YUJsb2NrID0gbnVsbDsgLy8gTGVhdmluZyB0aGlzIHJlZmVyZW5jZSB0byB4aHIgaW50YWN0IGhlcmUgd2lsbCBjYXVzZSBtZW1vcnkgbGVha3MgaW4gc29tZSBicm93c2Vyc1xuXG4gICAgICAgICAgICBjaHVuay54aHIgPSBudWxsO1xuXG4gICAgICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGZpbGUudXBsb2FkLnRvdGFsQ2h1bmtDb3VudDsgaSsrKSB7XG4gICAgICAgICAgICAgIGlmIChmaWxlLnVwbG9hZC5jaHVua3NbaV0gPT09IHVuZGVmaW5lZCkge1xuICAgICAgICAgICAgICAgIHJldHVybiBoYW5kbGVOZXh0Q2h1bmsoKTtcbiAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgIGlmIChmaWxlLnVwbG9hZC5jaHVua3NbaV0uc3RhdHVzICE9PSBEcm9wem9uZS5TVUNDRVNTKSB7XG4gICAgICAgICAgICAgICAgYWxsRmluaXNoZWQgPSBmYWxzZTtcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBpZiAoYWxsRmluaXNoZWQpIHtcbiAgICAgICAgICAgICAgX3RoaXMxNS5vcHRpb25zLmNodW5rc1VwbG9hZGVkKGZpbGUsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBfdGhpczE1Ll9maW5pc2hlZChmaWxlcywgJycsIG51bGwpO1xuICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9O1xuXG4gICAgICAgICAgaWYgKF90aGlzMTUub3B0aW9ucy5wYXJhbGxlbENodW5rVXBsb2Fkcykge1xuICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBmaWxlLnVwbG9hZC50b3RhbENodW5rQ291bnQ7IGkrKykge1xuICAgICAgICAgICAgICBoYW5kbGVOZXh0Q2h1bmsoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgaGFuZGxlTmV4dENodW5rKCk7XG4gICAgICAgICAgfVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHZhciBkYXRhQmxvY2tzID0gW107XG5cbiAgICAgICAgICBmb3IgKHZhciBfaTMgPSAwOyBfaTMgPCBmaWxlcy5sZW5ndGg7IF9pMysrKSB7XG4gICAgICAgICAgICBkYXRhQmxvY2tzW19pM10gPSB7XG4gICAgICAgICAgICAgIG5hbWU6IF90aGlzMTUuX2dldFBhcmFtTmFtZShfaTMpLFxuICAgICAgICAgICAgICBkYXRhOiB0cmFuc2Zvcm1lZEZpbGVzW19pM10sXG4gICAgICAgICAgICAgIGZpbGVuYW1lOiBmaWxlc1tfaTNdLnVwbG9hZC5maWxlbmFtZVxuICAgICAgICAgICAgfTtcbiAgICAgICAgICB9XG5cbiAgICAgICAgICBfdGhpczE1Ll91cGxvYWREYXRhKGZpbGVzLCBkYXRhQmxvY2tzKTtcbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfSAvLy8gUmV0dXJucyB0aGUgcmlnaHQgY2h1bmsgZm9yIGdpdmVuIGZpbGUgYW5kIHhoclxuXG4gIH0sIHtcbiAgICBrZXk6IFwiX2dldENodW5rXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9nZXRDaHVuayhmaWxlLCB4aHIpIHtcbiAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgZmlsZS51cGxvYWQudG90YWxDaHVua0NvdW50OyBpKyspIHtcbiAgICAgICAgaWYgKGZpbGUudXBsb2FkLmNodW5rc1tpXSAhPT0gdW5kZWZpbmVkICYmIGZpbGUudXBsb2FkLmNodW5rc1tpXS54aHIgPT09IHhocikge1xuICAgICAgICAgIHJldHVybiBmaWxlLnVwbG9hZC5jaHVua3NbaV07XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9IC8vIFRoaXMgZnVuY3Rpb24gYWN0dWFsbHkgdXBsb2FkcyB0aGUgZmlsZShzKSB0byB0aGUgc2VydmVyLlxuICAgIC8vIElmIGRhdGFCbG9ja3MgY29udGFpbnMgdGhlIGFjdHVhbCBkYXRhIHRvIHVwbG9hZCAobWVhbmluZywgdGhhdCB0aGlzIGNvdWxkIGVpdGhlciBiZSB0cmFuc2Zvcm1lZFxuICAgIC8vIGZpbGVzLCBvciBpbmRpdmlkdWFsIGNodW5rcyBmb3IgY2h1bmtlZCB1cGxvYWQpLlxuXG4gIH0sIHtcbiAgICBrZXk6IFwiX3VwbG9hZERhdGFcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX3VwbG9hZERhdGEoZmlsZXMsIGRhdGFCbG9ja3MpIHtcbiAgICAgIHZhciBfdGhpczE2ID0gdGhpcztcblxuICAgICAgdmFyIHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpOyAvLyBQdXQgdGhlIHhociBvYmplY3QgaW4gdGhlIGZpbGUgb2JqZWN0cyB0byBiZSBhYmxlIHRvIHJlZmVyZW5jZSBpdCBsYXRlci5cblxuICAgICAgdmFyIF9pdGVyYXRvcjIxID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgIF9zdGVwMjE7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMjEucygpOyAhKF9zdGVwMjEgPSBfaXRlcmF0b3IyMS5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIGZpbGUgPSBfc3RlcDIxLnZhbHVlO1xuICAgICAgICAgIGZpbGUueGhyID0geGhyO1xuICAgICAgICB9XG4gICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgX2l0ZXJhdG9yMjEuZShlcnIpO1xuICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgX2l0ZXJhdG9yMjEuZigpO1xuICAgICAgfVxuXG4gICAgICBpZiAoZmlsZXNbMF0udXBsb2FkLmNodW5rZWQpIHtcbiAgICAgICAgLy8gUHV0IHRoZSB4aHIgb2JqZWN0IGluIHRoZSByaWdodCBjaHVuayBvYmplY3QsIHNvIGl0IGNhbiBiZSBhc3NvY2lhdGVkIGxhdGVyLCBhbmQgZm91bmQgd2l0aCBfZ2V0Q2h1bmtcbiAgICAgICAgZmlsZXNbMF0udXBsb2FkLmNodW5rc1tkYXRhQmxvY2tzWzBdLmNodW5rSW5kZXhdLnhociA9IHhocjtcbiAgICAgIH1cblxuICAgICAgdmFyIG1ldGhvZCA9IHRoaXMucmVzb2x2ZU9wdGlvbih0aGlzLm9wdGlvbnMubWV0aG9kLCBmaWxlcyk7XG4gICAgICB2YXIgdXJsID0gdGhpcy5yZXNvbHZlT3B0aW9uKHRoaXMub3B0aW9ucy51cmwsIGZpbGVzKTtcbiAgICAgIHhoci5vcGVuKG1ldGhvZCwgdXJsLCB0cnVlKTsgLy8gU2V0dGluZyB0aGUgdGltZW91dCBhZnRlciBvcGVuIGJlY2F1c2Ugb2YgSUUxMSBpc3N1ZTogaHR0cHM6Ly9naXRsYWIuY29tL21lbm8vZHJvcHpvbmUvaXNzdWVzLzhcblxuICAgICAgeGhyLnRpbWVvdXQgPSB0aGlzLnJlc29sdmVPcHRpb24odGhpcy5vcHRpb25zLnRpbWVvdXQsIGZpbGVzKTsgLy8gSGFzIHRvIGJlIGFmdGVyIGAub3BlbigpYC4gU2VlIGh0dHBzOi8vZ2l0aHViLmNvbS9lbnlvL2Ryb3B6b25lL2lzc3Vlcy8xNzlcblxuICAgICAgeGhyLndpdGhDcmVkZW50aWFscyA9ICEhdGhpcy5vcHRpb25zLndpdGhDcmVkZW50aWFscztcblxuICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIF90aGlzMTYuX2ZpbmlzaGVkVXBsb2FkaW5nKGZpbGVzLCB4aHIsIGUpO1xuICAgICAgfTtcblxuICAgICAgeGhyLm9udGltZW91dCA9IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgX3RoaXMxNi5faGFuZGxlVXBsb2FkRXJyb3IoZmlsZXMsIHhociwgXCJSZXF1ZXN0IHRpbWVkb3V0IGFmdGVyIFwiLmNvbmNhdChfdGhpczE2Lm9wdGlvbnMudGltZW91dCAvIDEwMDAsIFwiIHNlY29uZHNcIikpO1xuICAgICAgfTtcblxuICAgICAgeGhyLm9uZXJyb3IgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgIF90aGlzMTYuX2hhbmRsZVVwbG9hZEVycm9yKGZpbGVzLCB4aHIpO1xuICAgICAgfTsgLy8gU29tZSBicm93c2VycyBkbyBub3QgaGF2ZSB0aGUgLnVwbG9hZCBwcm9wZXJ0eVxuXG5cbiAgICAgIHZhciBwcm9ncmVzc09iaiA9IHhoci51cGxvYWQgIT0gbnVsbCA/IHhoci51cGxvYWQgOiB4aHI7XG5cbiAgICAgIHByb2dyZXNzT2JqLm9ucHJvZ3Jlc3MgPSBmdW5jdGlvbiAoZSkge1xuICAgICAgICByZXR1cm4gX3RoaXMxNi5fdXBkYXRlRmlsZXNVcGxvYWRQcm9ncmVzcyhmaWxlcywgeGhyLCBlKTtcbiAgICAgIH07XG5cbiAgICAgIHZhciBoZWFkZXJzID0ge1xuICAgICAgICBcIkFjY2VwdFwiOiBcImFwcGxpY2F0aW9uL2pzb25cIixcbiAgICAgICAgXCJDYWNoZS1Db250cm9sXCI6IFwibm8tY2FjaGVcIixcbiAgICAgICAgXCJYLVJlcXVlc3RlZC1XaXRoXCI6IFwiWE1MSHR0cFJlcXVlc3RcIlxuICAgICAgfTtcblxuICAgICAgaWYgKHRoaXMub3B0aW9ucy5oZWFkZXJzKSB7XG4gICAgICAgIERyb3B6b25lLmV4dGVuZChoZWFkZXJzLCB0aGlzLm9wdGlvbnMuaGVhZGVycyk7XG4gICAgICB9XG5cbiAgICAgIGZvciAodmFyIGhlYWRlck5hbWUgaW4gaGVhZGVycykge1xuICAgICAgICB2YXIgaGVhZGVyVmFsdWUgPSBoZWFkZXJzW2hlYWRlck5hbWVdO1xuXG4gICAgICAgIGlmIChoZWFkZXJWYWx1ZSkge1xuICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKGhlYWRlck5hbWUsIGhlYWRlclZhbHVlKTtcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICB2YXIgZm9ybURhdGEgPSBuZXcgRm9ybURhdGEoKTsgLy8gQWRkaW5nIGFsbCBAb3B0aW9ucyBwYXJhbWV0ZXJzXG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMucGFyYW1zKSB7XG4gICAgICAgIHZhciBhZGRpdGlvbmFsUGFyYW1zID0gdGhpcy5vcHRpb25zLnBhcmFtcztcblxuICAgICAgICBpZiAodHlwZW9mIGFkZGl0aW9uYWxQYXJhbXMgPT09ICdmdW5jdGlvbicpIHtcbiAgICAgICAgICBhZGRpdGlvbmFsUGFyYW1zID0gYWRkaXRpb25hbFBhcmFtcy5jYWxsKHRoaXMsIGZpbGVzLCB4aHIsIGZpbGVzWzBdLnVwbG9hZC5jaHVua2VkID8gdGhpcy5fZ2V0Q2h1bmsoZmlsZXNbMF0sIHhocikgOiBudWxsKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGZvciAodmFyIGtleSBpbiBhZGRpdGlvbmFsUGFyYW1zKSB7XG4gICAgICAgICAgdmFyIHZhbHVlID0gYWRkaXRpb25hbFBhcmFtc1trZXldO1xuXG4gICAgICAgICAgaWYgKEFycmF5LmlzQXJyYXkodmFsdWUpKSB7XG4gICAgICAgICAgICAvLyBUaGUgYWRkaXRpb25hbCBwYXJhbWV0ZXIgY29udGFpbnMgYW4gYXJyYXksXG4gICAgICAgICAgICAvLyBzbyBsZXRzIGl0ZXJhdGUgb3ZlciBpdCB0byBhdHRhY2ggZWFjaCB2YWx1ZVxuICAgICAgICAgICAgLy8gaW5kaXZpZHVhbGx5LlxuICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCB2YWx1ZS5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICBmb3JtRGF0YS5hcHBlbmQoa2V5LCB2YWx1ZVtpXSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGZvcm1EYXRhLmFwcGVuZChrZXksIHZhbHVlKTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0gLy8gTGV0IHRoZSB1c2VyIGFkZCBhZGRpdGlvbmFsIGRhdGEgaWYgbmVjZXNzYXJ5XG5cblxuICAgICAgdmFyIF9pdGVyYXRvcjIyID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgIF9zdGVwMjI7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMjIucygpOyAhKF9zdGVwMjIgPSBfaXRlcmF0b3IyMi5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIF9maWxlID0gX3N0ZXAyMi52YWx1ZTtcbiAgICAgICAgICB0aGlzLmVtaXQoXCJzZW5kaW5nXCIsIF9maWxlLCB4aHIsIGZvcm1EYXRhKTtcbiAgICAgICAgfVxuICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgIF9pdGVyYXRvcjIyLmUoZXJyKTtcbiAgICAgIH0gZmluYWxseSB7XG4gICAgICAgIF9pdGVyYXRvcjIyLmYoKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHRoaXMub3B0aW9ucy51cGxvYWRNdWx0aXBsZSkge1xuICAgICAgICB0aGlzLmVtaXQoXCJzZW5kaW5nbXVsdGlwbGVcIiwgZmlsZXMsIHhociwgZm9ybURhdGEpO1xuICAgICAgfVxuXG4gICAgICB0aGlzLl9hZGRGb3JtRWxlbWVudERhdGEoZm9ybURhdGEpOyAvLyBGaW5hbGx5IGFkZCB0aGUgZmlsZXNcbiAgICAgIC8vIEhhcyB0byBiZSBsYXN0IGJlY2F1c2Ugc29tZSBzZXJ2ZXJzIChlZzogUzMpIGV4cGVjdCB0aGUgZmlsZSB0byBiZSB0aGUgbGFzdCBwYXJhbWV0ZXJcblxuXG4gICAgICBmb3IgKHZhciBfaTQgPSAwOyBfaTQgPCBkYXRhQmxvY2tzLmxlbmd0aDsgX2k0KyspIHtcbiAgICAgICAgdmFyIGRhdGFCbG9jayA9IGRhdGFCbG9ja3NbX2k0XTtcbiAgICAgICAgZm9ybURhdGEuYXBwZW5kKGRhdGFCbG9jay5uYW1lLCBkYXRhQmxvY2suZGF0YSwgZGF0YUJsb2NrLmZpbGVuYW1lKTtcbiAgICAgIH1cblxuICAgICAgdGhpcy5zdWJtaXRSZXF1ZXN0KHhociwgZm9ybURhdGEsIGZpbGVzKTtcbiAgICB9IC8vIFRyYW5zZm9ybXMgYWxsIGZpbGVzIHdpdGggdGhpcy5vcHRpb25zLnRyYW5zZm9ybUZpbGUgYW5kIGludm9rZXMgZG9uZSB3aXRoIHRoZSB0cmFuc2Zvcm1lZCBmaWxlcyB3aGVuIGRvbmUuXG5cbiAgfSwge1xuICAgIGtleTogXCJfdHJhbnNmb3JtRmlsZXNcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX3RyYW5zZm9ybUZpbGVzKGZpbGVzLCBkb25lKSB7XG4gICAgICB2YXIgX3RoaXMxNyA9IHRoaXM7XG5cbiAgICAgIHZhciB0cmFuc2Zvcm1lZEZpbGVzID0gW107IC8vIENsdW1zeSB3YXkgb2YgaGFuZGxpbmcgYXN5bmNocm9ub3VzIGNhbGxzLCB1bnRpbCBJIGdldCB0byBhZGQgYSBwcm9wZXIgRnV0dXJlIGxpYnJhcnkuXG5cbiAgICAgIHZhciBkb25lQ291bnRlciA9IDA7XG5cbiAgICAgIHZhciBfbG9vcCA9IGZ1bmN0aW9uIF9sb29wKGkpIHtcbiAgICAgICAgX3RoaXMxNy5vcHRpb25zLnRyYW5zZm9ybUZpbGUuY2FsbChfdGhpczE3LCBmaWxlc1tpXSwgZnVuY3Rpb24gKHRyYW5zZm9ybWVkRmlsZSkge1xuICAgICAgICAgIHRyYW5zZm9ybWVkRmlsZXNbaV0gPSB0cmFuc2Zvcm1lZEZpbGU7XG5cbiAgICAgICAgICBpZiAoKytkb25lQ291bnRlciA9PT0gZmlsZXMubGVuZ3RoKSB7XG4gICAgICAgICAgICBkb25lKHRyYW5zZm9ybWVkRmlsZXMpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICB9O1xuXG4gICAgICBmb3IgKHZhciBpID0gMDsgaSA8IGZpbGVzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgIF9sb29wKGkpO1xuICAgICAgfVxuICAgIH0gLy8gVGFrZXMgY2FyZSBvZiBhZGRpbmcgb3RoZXIgaW5wdXQgZWxlbWVudHMgb2YgdGhlIGZvcm0gdG8gdGhlIEFKQVggcmVxdWVzdFxuXG4gIH0sIHtcbiAgICBrZXk6IFwiX2FkZEZvcm1FbGVtZW50RGF0YVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBfYWRkRm9ybUVsZW1lbnREYXRhKGZvcm1EYXRhKSB7XG4gICAgICAvLyBUYWtlIGNhcmUgb2Ygb3RoZXIgaW5wdXQgZWxlbWVudHNcbiAgICAgIGlmICh0aGlzLmVsZW1lbnQudGFnTmFtZSA9PT0gXCJGT1JNXCIpIHtcbiAgICAgICAgdmFyIF9pdGVyYXRvcjIzID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIodGhpcy5lbGVtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJpbnB1dCwgdGV4dGFyZWEsIHNlbGVjdCwgYnV0dG9uXCIpKSxcbiAgICAgICAgICAgIF9zdGVwMjM7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjIzLnMoKTsgIShfc3RlcDIzID0gX2l0ZXJhdG9yMjMubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIGlucHV0ID0gX3N0ZXAyMy52YWx1ZTtcbiAgICAgICAgICAgIHZhciBpbnB1dE5hbWUgPSBpbnB1dC5nZXRBdHRyaWJ1dGUoXCJuYW1lXCIpO1xuICAgICAgICAgICAgdmFyIGlucHV0VHlwZSA9IGlucHV0LmdldEF0dHJpYnV0ZShcInR5cGVcIik7XG4gICAgICAgICAgICBpZiAoaW5wdXRUeXBlKSBpbnB1dFR5cGUgPSBpbnB1dFR5cGUudG9Mb3dlckNhc2UoKTsgLy8gSWYgdGhlIGlucHV0IGRvZXNuJ3QgaGF2ZSBhIG5hbWUsIHdlIGNhbid0IHVzZSBpdC5cblxuICAgICAgICAgICAgaWYgKHR5cGVvZiBpbnB1dE5hbWUgPT09ICd1bmRlZmluZWQnIHx8IGlucHV0TmFtZSA9PT0gbnVsbCkgY29udGludWU7XG5cbiAgICAgICAgICAgIGlmIChpbnB1dC50YWdOYW1lID09PSBcIlNFTEVDVFwiICYmIGlucHV0Lmhhc0F0dHJpYnV0ZShcIm11bHRpcGxlXCIpKSB7XG4gICAgICAgICAgICAgIC8vIFBvc3NpYmx5IG11bHRpcGxlIHZhbHVlc1xuICAgICAgICAgICAgICB2YXIgX2l0ZXJhdG9yMjQgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihpbnB1dC5vcHRpb25zKSxcbiAgICAgICAgICAgICAgICAgIF9zdGVwMjQ7XG5cbiAgICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICBmb3IgKF9pdGVyYXRvcjI0LnMoKTsgIShfc3RlcDI0ID0gX2l0ZXJhdG9yMjQubigpKS5kb25lOykge1xuICAgICAgICAgICAgICAgICAgdmFyIG9wdGlvbiA9IF9zdGVwMjQudmFsdWU7XG5cbiAgICAgICAgICAgICAgICAgIGlmIChvcHRpb24uc2VsZWN0ZWQpIHtcbiAgICAgICAgICAgICAgICAgICAgZm9ybURhdGEuYXBwZW5kKGlucHV0TmFtZSwgb3B0aW9uLnZhbHVlKTtcbiAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICAgIF9pdGVyYXRvcjI0LmUoZXJyKTtcbiAgICAgICAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICAgICAgICBfaXRlcmF0b3IyNC5mKCk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSBpZiAoIWlucHV0VHlwZSB8fCBpbnB1dFR5cGUgIT09IFwiY2hlY2tib3hcIiAmJiBpbnB1dFR5cGUgIT09IFwicmFkaW9cIiB8fCBpbnB1dC5jaGVja2VkKSB7XG4gICAgICAgICAgICAgIGZvcm1EYXRhLmFwcGVuZChpbnB1dE5hbWUsIGlucHV0LnZhbHVlKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG4gICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgIF9pdGVyYXRvcjIzLmUoZXJyKTtcbiAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICBfaXRlcmF0b3IyMy5mKCk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9IC8vIEludm9rZWQgd2hlbiB0aGVyZSBpcyBuZXcgcHJvZ3Jlc3MgaW5mb3JtYXRpb24gYWJvdXQgZ2l2ZW4gZmlsZXMuXG4gICAgLy8gSWYgZSBpcyBub3QgcHJvdmlkZWQsIGl0IGlzIGFzc3VtZWQgdGhhdCB0aGUgdXBsb2FkIGlzIGZpbmlzaGVkLlxuXG4gIH0sIHtcbiAgICBrZXk6IFwiX3VwZGF0ZUZpbGVzVXBsb2FkUHJvZ3Jlc3NcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX3VwZGF0ZUZpbGVzVXBsb2FkUHJvZ3Jlc3MoZmlsZXMsIHhociwgZSkge1xuICAgICAgdmFyIHByb2dyZXNzO1xuXG4gICAgICBpZiAodHlwZW9mIGUgIT09ICd1bmRlZmluZWQnKSB7XG4gICAgICAgIHByb2dyZXNzID0gMTAwICogZS5sb2FkZWQgLyBlLnRvdGFsO1xuXG4gICAgICAgIGlmIChmaWxlc1swXS51cGxvYWQuY2h1bmtlZCkge1xuICAgICAgICAgIHZhciBmaWxlID0gZmlsZXNbMF07IC8vIFNpbmNlIHRoaXMgaXMgYSBjaHVua2VkIHVwbG9hZCwgd2UgbmVlZCB0byB1cGRhdGUgdGhlIGFwcHJvcHJpYXRlIGNodW5rIHByb2dyZXNzLlxuXG4gICAgICAgICAgdmFyIGNodW5rID0gdGhpcy5fZ2V0Q2h1bmsoZmlsZSwgeGhyKTtcblxuICAgICAgICAgIGNodW5rLnByb2dyZXNzID0gcHJvZ3Jlc3M7XG4gICAgICAgICAgY2h1bmsudG90YWwgPSBlLnRvdGFsO1xuICAgICAgICAgIGNodW5rLmJ5dGVzU2VudCA9IGUubG9hZGVkO1xuICAgICAgICAgIHZhciBmaWxlUHJvZ3Jlc3MgPSAwLFxuICAgICAgICAgICAgICBmaWxlVG90YWwsXG4gICAgICAgICAgICAgIGZpbGVCeXRlc1NlbnQ7XG4gICAgICAgICAgZmlsZS51cGxvYWQucHJvZ3Jlc3MgPSAwO1xuICAgICAgICAgIGZpbGUudXBsb2FkLnRvdGFsID0gMDtcbiAgICAgICAgICBmaWxlLnVwbG9hZC5ieXRlc1NlbnQgPSAwO1xuXG4gICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBmaWxlLnVwbG9hZC50b3RhbENodW5rQ291bnQ7IGkrKykge1xuICAgICAgICAgICAgaWYgKGZpbGUudXBsb2FkLmNodW5rc1tpXSAhPT0gdW5kZWZpbmVkICYmIGZpbGUudXBsb2FkLmNodW5rc1tpXS5wcm9ncmVzcyAhPT0gdW5kZWZpbmVkKSB7XG4gICAgICAgICAgICAgIGZpbGUudXBsb2FkLnByb2dyZXNzICs9IGZpbGUudXBsb2FkLmNodW5rc1tpXS5wcm9ncmVzcztcbiAgICAgICAgICAgICAgZmlsZS51cGxvYWQudG90YWwgKz0gZmlsZS51cGxvYWQuY2h1bmtzW2ldLnRvdGFsO1xuICAgICAgICAgICAgICBmaWxlLnVwbG9hZC5ieXRlc1NlbnQgKz0gZmlsZS51cGxvYWQuY2h1bmtzW2ldLmJ5dGVzU2VudDtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG5cbiAgICAgICAgICBmaWxlLnVwbG9hZC5wcm9ncmVzcyA9IGZpbGUudXBsb2FkLnByb2dyZXNzIC8gZmlsZS51cGxvYWQudG90YWxDaHVua0NvdW50O1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHZhciBfaXRlcmF0b3IyNSA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGZpbGVzKSxcbiAgICAgICAgICAgICAgX3N0ZXAyNTtcblxuICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICBmb3IgKF9pdGVyYXRvcjI1LnMoKTsgIShfc3RlcDI1ID0gX2l0ZXJhdG9yMjUubigpKS5kb25lOykge1xuICAgICAgICAgICAgICB2YXIgX2ZpbGUyID0gX3N0ZXAyNS52YWx1ZTtcbiAgICAgICAgICAgICAgX2ZpbGUyLnVwbG9hZC5wcm9ncmVzcyA9IHByb2dyZXNzO1xuICAgICAgICAgICAgICBfZmlsZTIudXBsb2FkLnRvdGFsID0gZS50b3RhbDtcbiAgICAgICAgICAgICAgX2ZpbGUyLnVwbG9hZC5ieXRlc1NlbnQgPSBlLmxvYWRlZDtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgIF9pdGVyYXRvcjI1LmUoZXJyKTtcbiAgICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgICAgX2l0ZXJhdG9yMjUuZigpO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIHZhciBfaXRlcmF0b3IyNiA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGZpbGVzKSxcbiAgICAgICAgICAgIF9zdGVwMjY7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjI2LnMoKTsgIShfc3RlcDI2ID0gX2l0ZXJhdG9yMjYubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIF9maWxlMyA9IF9zdGVwMjYudmFsdWU7XG4gICAgICAgICAgICB0aGlzLmVtaXQoXCJ1cGxvYWRwcm9ncmVzc1wiLCBfZmlsZTMsIF9maWxlMy51cGxvYWQucHJvZ3Jlc3MsIF9maWxlMy51cGxvYWQuYnl0ZXNTZW50KTtcbiAgICAgICAgICB9XG4gICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgIF9pdGVyYXRvcjI2LmUoZXJyKTtcbiAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICBfaXRlcmF0b3IyNi5mKCk7XG4gICAgICAgIH1cbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIC8vIENhbGxlZCB3aGVuIHRoZSBmaWxlIGZpbmlzaGVkIHVwbG9hZGluZ1xuICAgICAgICB2YXIgYWxsRmlsZXNGaW5pc2hlZCA9IHRydWU7XG4gICAgICAgIHByb2dyZXNzID0gMTAwO1xuXG4gICAgICAgIHZhciBfaXRlcmF0b3IyNyA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGZpbGVzKSxcbiAgICAgICAgICAgIF9zdGVwMjc7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjI3LnMoKTsgIShfc3RlcDI3ID0gX2l0ZXJhdG9yMjcubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIF9maWxlNCA9IF9zdGVwMjcudmFsdWU7XG5cbiAgICAgICAgICAgIGlmIChfZmlsZTQudXBsb2FkLnByb2dyZXNzICE9PSAxMDAgfHwgX2ZpbGU0LnVwbG9hZC5ieXRlc1NlbnQgIT09IF9maWxlNC51cGxvYWQudG90YWwpIHtcbiAgICAgICAgICAgICAgYWxsRmlsZXNGaW5pc2hlZCA9IGZhbHNlO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBfZmlsZTQudXBsb2FkLnByb2dyZXNzID0gcHJvZ3Jlc3M7XG4gICAgICAgICAgICBfZmlsZTQudXBsb2FkLmJ5dGVzU2VudCA9IF9maWxlNC51cGxvYWQudG90YWw7XG4gICAgICAgICAgfSAvLyBOb3RoaW5nIHRvIGRvLCBhbGwgZmlsZXMgYWxyZWFkeSBhdCAxMDAlXG5cbiAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgX2l0ZXJhdG9yMjcuZShlcnIpO1xuICAgICAgICB9IGZpbmFsbHkge1xuICAgICAgICAgIF9pdGVyYXRvcjI3LmYoKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmIChhbGxGaWxlc0ZpbmlzaGVkKSB7XG4gICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgdmFyIF9pdGVyYXRvcjI4ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgICAgX3N0ZXAyODtcblxuICAgICAgICB0cnkge1xuICAgICAgICAgIGZvciAoX2l0ZXJhdG9yMjgucygpOyAhKF9zdGVwMjggPSBfaXRlcmF0b3IyOC5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgICB2YXIgX2ZpbGU1ID0gX3N0ZXAyOC52YWx1ZTtcbiAgICAgICAgICAgIHRoaXMuZW1pdChcInVwbG9hZHByb2dyZXNzXCIsIF9maWxlNSwgcHJvZ3Jlc3MsIF9maWxlNS51cGxvYWQuYnl0ZXNTZW50KTtcbiAgICAgICAgICB9XG4gICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgIF9pdGVyYXRvcjI4LmUoZXJyKTtcbiAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICBfaXRlcmF0b3IyOC5mKCk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiX2ZpbmlzaGVkVXBsb2FkaW5nXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9maW5pc2hlZFVwbG9hZGluZyhmaWxlcywgeGhyLCBlKSB7XG4gICAgICB2YXIgcmVzcG9uc2U7XG5cbiAgICAgIGlmIChmaWxlc1swXS5zdGF0dXMgPT09IERyb3B6b25lLkNBTkNFTEVEKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgaWYgKHhoci5yZWFkeVN0YXRlICE9PSA0KSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgaWYgKHhoci5yZXNwb25zZVR5cGUgIT09ICdhcnJheWJ1ZmZlcicgJiYgeGhyLnJlc3BvbnNlVHlwZSAhPT0gJ2Jsb2InKSB7XG4gICAgICAgIHJlc3BvbnNlID0geGhyLnJlc3BvbnNlVGV4dDtcblxuICAgICAgICBpZiAoeGhyLmdldFJlc3BvbnNlSGVhZGVyKFwiY29udGVudC10eXBlXCIpICYmIH54aHIuZ2V0UmVzcG9uc2VIZWFkZXIoXCJjb250ZW50LXR5cGVcIikuaW5kZXhPZihcImFwcGxpY2F0aW9uL2pzb25cIikpIHtcbiAgICAgICAgICB0cnkge1xuICAgICAgICAgICAgcmVzcG9uc2UgPSBKU09OLnBhcnNlKHJlc3BvbnNlKTtcbiAgICAgICAgICB9IGNhdGNoIChlcnJvcikge1xuICAgICAgICAgICAgZSA9IGVycm9yO1xuICAgICAgICAgICAgcmVzcG9uc2UgPSBcIkludmFsaWQgSlNPTiByZXNwb25zZSBmcm9tIHNlcnZlci5cIjtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH1cblxuICAgICAgdGhpcy5fdXBkYXRlRmlsZXNVcGxvYWRQcm9ncmVzcyhmaWxlcyk7XG5cbiAgICAgIGlmICghKDIwMCA8PSB4aHIuc3RhdHVzICYmIHhoci5zdGF0dXMgPCAzMDApKSB7XG4gICAgICAgIHRoaXMuX2hhbmRsZVVwbG9hZEVycm9yKGZpbGVzLCB4aHIsIHJlc3BvbnNlKTtcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIGlmIChmaWxlc1swXS51cGxvYWQuY2h1bmtlZCkge1xuICAgICAgICAgIGZpbGVzWzBdLnVwbG9hZC5maW5pc2hlZENodW5rVXBsb2FkKHRoaXMuX2dldENodW5rKGZpbGVzWzBdLCB4aHIpKTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICB0aGlzLl9maW5pc2hlZChmaWxlcywgcmVzcG9uc2UsIGUpO1xuICAgICAgICB9XG4gICAgICB9XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcIl9oYW5kbGVVcGxvYWRFcnJvclwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBfaGFuZGxlVXBsb2FkRXJyb3IoZmlsZXMsIHhociwgcmVzcG9uc2UpIHtcbiAgICAgIGlmIChmaWxlc1swXS5zdGF0dXMgPT09IERyb3B6b25lLkNBTkNFTEVEKSB7XG4gICAgICAgIHJldHVybjtcbiAgICAgIH1cblxuICAgICAgaWYgKGZpbGVzWzBdLnVwbG9hZC5jaHVua2VkICYmIHRoaXMub3B0aW9ucy5yZXRyeUNodW5rcykge1xuICAgICAgICB2YXIgY2h1bmsgPSB0aGlzLl9nZXRDaHVuayhmaWxlc1swXSwgeGhyKTtcblxuICAgICAgICBpZiAoY2h1bmsucmV0cmllcysrIDwgdGhpcy5vcHRpb25zLnJldHJ5Q2h1bmtzTGltaXQpIHtcbiAgICAgICAgICB0aGlzLl91cGxvYWREYXRhKGZpbGVzLCBbY2h1bmsuZGF0YUJsb2NrXSk7XG5cbiAgICAgICAgICByZXR1cm47XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgY29uc29sZS53YXJuKCdSZXRyaWVkIHRoaXMgY2h1bmsgdG9vIG9mdGVuLiBHaXZpbmcgdXAuJyk7XG4gICAgICAgIH1cbiAgICAgIH1cblxuICAgICAgdGhpcy5fZXJyb3JQcm9jZXNzaW5nKGZpbGVzLCByZXNwb25zZSB8fCB0aGlzLm9wdGlvbnMuZGljdFJlc3BvbnNlRXJyb3IucmVwbGFjZShcInt7c3RhdHVzQ29kZX19XCIsIHhoci5zdGF0dXMpLCB4aHIpO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJzdWJtaXRSZXF1ZXN0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIHN1Ym1pdFJlcXVlc3QoeGhyLCBmb3JtRGF0YSwgZmlsZXMpIHtcbiAgICAgIHhoci5zZW5kKGZvcm1EYXRhKTtcbiAgICB9IC8vIENhbGxlZCBpbnRlcm5hbGx5IHdoZW4gcHJvY2Vzc2luZyBpcyBmaW5pc2hlZC5cbiAgICAvLyBJbmRpdmlkdWFsIGNhbGxiYWNrcyBoYXZlIHRvIGJlIGNhbGxlZCBpbiB0aGUgYXBwcm9wcmlhdGUgc2VjdGlvbnMuXG5cbiAgfSwge1xuICAgIGtleTogXCJfZmluaXNoZWRcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gX2ZpbmlzaGVkKGZpbGVzLCByZXNwb25zZVRleHQsIGUpIHtcbiAgICAgIHZhciBfaXRlcmF0b3IyOSA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGZpbGVzKSxcbiAgICAgICAgICBfc3RlcDI5O1xuXG4gICAgICB0cnkge1xuICAgICAgICBmb3IgKF9pdGVyYXRvcjI5LnMoKTsgIShfc3RlcDI5ID0gX2l0ZXJhdG9yMjkubigpKS5kb25lOykge1xuICAgICAgICAgIHZhciBmaWxlID0gX3N0ZXAyOS52YWx1ZTtcbiAgICAgICAgICBmaWxlLnN0YXR1cyA9IERyb3B6b25lLlNVQ0NFU1M7XG4gICAgICAgICAgdGhpcy5lbWl0KFwic3VjY2Vzc1wiLCBmaWxlLCByZXNwb25zZVRleHQsIGUpO1xuICAgICAgICAgIHRoaXMuZW1pdChcImNvbXBsZXRlXCIsIGZpbGUpO1xuICAgICAgICB9XG4gICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgX2l0ZXJhdG9yMjkuZShlcnIpO1xuICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgX2l0ZXJhdG9yMjkuZigpO1xuICAgICAgfVxuXG4gICAgICBpZiAodGhpcy5vcHRpb25zLnVwbG9hZE11bHRpcGxlKSB7XG4gICAgICAgIHRoaXMuZW1pdChcInN1Y2Nlc3NtdWx0aXBsZVwiLCBmaWxlcywgcmVzcG9uc2VUZXh0LCBlKTtcbiAgICAgICAgdGhpcy5lbWl0KFwiY29tcGxldGVtdWx0aXBsZVwiLCBmaWxlcyk7XG4gICAgICB9XG5cbiAgICAgIGlmICh0aGlzLm9wdGlvbnMuYXV0b1Byb2Nlc3NRdWV1ZSkge1xuICAgICAgICByZXR1cm4gdGhpcy5wcm9jZXNzUXVldWUoKTtcbiAgICAgIH1cbiAgICB9IC8vIENhbGxlZCBpbnRlcm5hbGx5IHdoZW4gcHJvY2Vzc2luZyBpcyBmaW5pc2hlZC5cbiAgICAvLyBJbmRpdmlkdWFsIGNhbGxiYWNrcyBoYXZlIHRvIGJlIGNhbGxlZCBpbiB0aGUgYXBwcm9wcmlhdGUgc2VjdGlvbnMuXG5cbiAgfSwge1xuICAgIGtleTogXCJfZXJyb3JQcm9jZXNzaW5nXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIF9lcnJvclByb2Nlc3NpbmcoZmlsZXMsIG1lc3NhZ2UsIHhocikge1xuICAgICAgdmFyIF9pdGVyYXRvcjMwID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoZmlsZXMpLFxuICAgICAgICAgIF9zdGVwMzA7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMzAucygpOyAhKF9zdGVwMzAgPSBfaXRlcmF0b3IzMC5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgdmFyIGZpbGUgPSBfc3RlcDMwLnZhbHVlO1xuICAgICAgICAgIGZpbGUuc3RhdHVzID0gRHJvcHpvbmUuRVJST1I7XG4gICAgICAgICAgdGhpcy5lbWl0KFwiZXJyb3JcIiwgZmlsZSwgbWVzc2FnZSwgeGhyKTtcbiAgICAgICAgICB0aGlzLmVtaXQoXCJjb21wbGV0ZVwiLCBmaWxlKTtcbiAgICAgICAgfVxuICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgIF9pdGVyYXRvcjMwLmUoZXJyKTtcbiAgICAgIH0gZmluYWxseSB7XG4gICAgICAgIF9pdGVyYXRvcjMwLmYoKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHRoaXMub3B0aW9ucy51cGxvYWRNdWx0aXBsZSkge1xuICAgICAgICB0aGlzLmVtaXQoXCJlcnJvcm11bHRpcGxlXCIsIGZpbGVzLCBtZXNzYWdlLCB4aHIpO1xuICAgICAgICB0aGlzLmVtaXQoXCJjb21wbGV0ZW11bHRpcGxlXCIsIGZpbGVzKTtcbiAgICAgIH1cblxuICAgICAgaWYgKHRoaXMub3B0aW9ucy5hdXRvUHJvY2Vzc1F1ZXVlKSB7XG4gICAgICAgIHJldHVybiB0aGlzLnByb2Nlc3NRdWV1ZSgpO1xuICAgICAgfVxuICAgIH1cbiAgfV0sIFt7XG4gICAga2V5OiBcInV1aWR2NFwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiB1dWlkdjQoKSB7XG4gICAgICByZXR1cm4gJ3h4eHh4eHh4LXh4eHgtNHh4eC15eHh4LXh4eHh4eHh4eHh4eCcucmVwbGFjZSgvW3h5XS9nLCBmdW5jdGlvbiAoYykge1xuICAgICAgICB2YXIgciA9IE1hdGgucmFuZG9tKCkgKiAxNiB8IDAsXG4gICAgICAgICAgICB2ID0gYyA9PT0gJ3gnID8gciA6IHIgJiAweDMgfCAweDg7XG4gICAgICAgIHJldHVybiB2LnRvU3RyaW5nKDE2KTtcbiAgICAgIH0pO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBEcm9wem9uZTtcbn0oRW1pdHRlcik7XG5cbkRyb3B6b25lLmluaXRDbGFzcygpO1xuRHJvcHpvbmUudmVyc2lvbiA9IFwiNS43LjJcIjsgLy8gVGhpcyBpcyBhIG1hcCBvZiBvcHRpb25zIGZvciB5b3VyIGRpZmZlcmVudCBkcm9wem9uZXMuIEFkZCBjb25maWd1cmF0aW9uc1xuLy8gdG8gdGhpcyBvYmplY3QgZm9yIHlvdXIgZGlmZmVyZW50IGRyb3B6b25lIGVsZW1lbnMuXG4vL1xuLy8gRXhhbXBsZTpcbi8vXG4vLyAgICAgRHJvcHpvbmUub3B0aW9ucy5teURyb3B6b25lRWxlbWVudElkID0geyBtYXhGaWxlc2l6ZTogMSB9O1xuLy9cbi8vIFRvIGRpc2FibGUgYXV0b0Rpc2NvdmVyIGZvciBhIHNwZWNpZmljIGVsZW1lbnQsIHlvdSBjYW4gc2V0IGBmYWxzZWAgYXMgYW4gb3B0aW9uOlxuLy9cbi8vICAgICBEcm9wem9uZS5vcHRpb25zLm15RGlzYWJsZWRFbGVtZW50SWQgPSBmYWxzZTtcbi8vXG4vLyBBbmQgaW4gaHRtbDpcbi8vXG4vLyAgICAgPGZvcm0gYWN0aW9uPVwiL3VwbG9hZFwiIGlkPVwibXktZHJvcHpvbmUtZWxlbWVudC1pZFwiIGNsYXNzPVwiZHJvcHpvbmVcIj48L2Zvcm0+XG5cbkRyb3B6b25lLm9wdGlvbnMgPSB7fTsgLy8gUmV0dXJucyB0aGUgb3B0aW9ucyBmb3IgYW4gZWxlbWVudCBvciB1bmRlZmluZWQgaWYgbm9uZSBhdmFpbGFibGUuXG5cbkRyb3B6b25lLm9wdGlvbnNGb3JFbGVtZW50ID0gZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgLy8gR2V0IHRoZSBgRHJvcHpvbmUub3B0aW9ucy5lbGVtZW50SWRgIGZvciB0aGlzIGVsZW1lbnQgaWYgaXQgZXhpc3RzXG4gIGlmIChlbGVtZW50LmdldEF0dHJpYnV0ZShcImlkXCIpKSB7XG4gICAgcmV0dXJuIERyb3B6b25lLm9wdGlvbnNbY2FtZWxpemUoZWxlbWVudC5nZXRBdHRyaWJ1dGUoXCJpZFwiKSldO1xuICB9IGVsc2Uge1xuICAgIHJldHVybiB1bmRlZmluZWQ7XG4gIH1cbn07IC8vIEhvbGRzIGEgbGlzdCBvZiBhbGwgZHJvcHpvbmUgaW5zdGFuY2VzXG5cblxuRHJvcHpvbmUuaW5zdGFuY2VzID0gW107IC8vIFJldHVybnMgdGhlIGRyb3B6b25lIGZvciBnaXZlbiBlbGVtZW50IGlmIGFueVxuXG5Ecm9wem9uZS5mb3JFbGVtZW50ID0gZnVuY3Rpb24gKGVsZW1lbnQpIHtcbiAgaWYgKHR5cGVvZiBlbGVtZW50ID09PSBcInN0cmluZ1wiKSB7XG4gICAgZWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoZWxlbWVudCk7XG4gIH1cblxuICBpZiAoKGVsZW1lbnQgIT0gbnVsbCA/IGVsZW1lbnQuZHJvcHpvbmUgOiB1bmRlZmluZWQpID09IG51bGwpIHtcbiAgICB0aHJvdyBuZXcgRXJyb3IoXCJObyBEcm9wem9uZSBmb3VuZCBmb3IgZ2l2ZW4gZWxlbWVudC4gVGhpcyBpcyBwcm9iYWJseSBiZWNhdXNlIHlvdSdyZSB0cnlpbmcgdG8gYWNjZXNzIGl0IGJlZm9yZSBEcm9wem9uZSBoYWQgdGhlIHRpbWUgdG8gaW5pdGlhbGl6ZS4gVXNlIHRoZSBgaW5pdGAgb3B0aW9uIHRvIHNldHVwIGFueSBhZGRpdGlvbmFsIG9ic2VydmVycyBvbiB5b3VyIERyb3B6b25lLlwiKTtcbiAgfVxuXG4gIHJldHVybiBlbGVtZW50LmRyb3B6b25lO1xufTsgLy8gU2V0IHRvIGZhbHNlIGlmIHlvdSBkb24ndCB3YW50IERyb3B6b25lIHRvIGF1dG9tYXRpY2FsbHkgZmluZCBhbmQgYXR0YWNoIHRvIC5kcm9wem9uZSBlbGVtZW50cy5cblxuXG5Ecm9wem9uZS5hdXRvRGlzY292ZXIgPSB0cnVlOyAvLyBMb29rcyBmb3IgYWxsIC5kcm9wem9uZSBlbGVtZW50cyBhbmQgY3JlYXRlcyBhIGRyb3B6b25lIGZvciB0aGVtXG5cbkRyb3B6b25lLmRpc2NvdmVyID0gZnVuY3Rpb24gKCkge1xuICB2YXIgZHJvcHpvbmVzO1xuXG4gIGlmIChkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKSB7XG4gICAgZHJvcHpvbmVzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5kcm9wem9uZVwiKTtcbiAgfSBlbHNlIHtcbiAgICBkcm9wem9uZXMgPSBbXTsgLy8gSUUgOihcblxuICAgIHZhciBjaGVja0VsZW1lbnRzID0gZnVuY3Rpb24gY2hlY2tFbGVtZW50cyhlbGVtZW50cykge1xuICAgICAgcmV0dXJuIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIHJlc3VsdCA9IFtdO1xuXG4gICAgICAgIHZhciBfaXRlcmF0b3IzMSA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGVsZW1lbnRzKSxcbiAgICAgICAgICAgIF9zdGVwMzE7XG5cbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICBmb3IgKF9pdGVyYXRvcjMxLnMoKTsgIShfc3RlcDMxID0gX2l0ZXJhdG9yMzEubigpKS5kb25lOykge1xuICAgICAgICAgICAgdmFyIGVsID0gX3N0ZXAzMS52YWx1ZTtcblxuICAgICAgICAgICAgaWYgKC8oXnwgKWRyb3B6b25lKCR8ICkvLnRlc3QoZWwuY2xhc3NOYW1lKSkge1xuICAgICAgICAgICAgICByZXN1bHQucHVzaChkcm9wem9uZXMucHVzaChlbCkpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgcmVzdWx0LnB1c2godW5kZWZpbmVkKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9XG4gICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgIF9pdGVyYXRvcjMxLmUoZXJyKTtcbiAgICAgICAgfSBmaW5hbGx5IHtcbiAgICAgICAgICBfaXRlcmF0b3IzMS5mKCk7XG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gcmVzdWx0O1xuICAgICAgfSgpO1xuICAgIH07XG5cbiAgICBjaGVja0VsZW1lbnRzKGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpKTtcbiAgICBjaGVja0VsZW1lbnRzKGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZm9ybVwiKSk7XG4gIH1cblxuICByZXR1cm4gZnVuY3Rpb24gKCkge1xuICAgIHZhciByZXN1bHQgPSBbXTtcblxuICAgIHZhciBfaXRlcmF0b3IzMiA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGRyb3B6b25lcyksXG4gICAgICAgIF9zdGVwMzI7XG5cbiAgICB0cnkge1xuICAgICAgZm9yIChfaXRlcmF0b3IzMi5zKCk7ICEoX3N0ZXAzMiA9IF9pdGVyYXRvcjMyLm4oKSkuZG9uZTspIHtcbiAgICAgICAgdmFyIGRyb3B6b25lID0gX3N0ZXAzMi52YWx1ZTtcblxuICAgICAgICAvLyBDcmVhdGUgYSBkcm9wem9uZSB1bmxlc3MgYXV0byBkaXNjb3ZlciBoYXMgYmVlbiBkaXNhYmxlZCBmb3Igc3BlY2lmaWMgZWxlbWVudFxuICAgICAgICBpZiAoRHJvcHpvbmUub3B0aW9uc0ZvckVsZW1lbnQoZHJvcHpvbmUpICE9PSBmYWxzZSkge1xuICAgICAgICAgIHJlc3VsdC5wdXNoKG5ldyBEcm9wem9uZShkcm9wem9uZSkpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHJlc3VsdC5wdXNoKHVuZGVmaW5lZCk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgIF9pdGVyYXRvcjMyLmUoZXJyKTtcbiAgICB9IGZpbmFsbHkge1xuICAgICAgX2l0ZXJhdG9yMzIuZigpO1xuICAgIH1cblxuICAgIHJldHVybiByZXN1bHQ7XG4gIH0oKTtcbn07IC8vIFNpbmNlIHRoZSB3aG9sZSBEcmFnJ24nRHJvcCBBUEkgaXMgcHJldHR5IG5ldywgc29tZSBicm93c2VycyBpbXBsZW1lbnQgaXQsXG4vLyBidXQgbm90IGNvcnJlY3RseS5cbi8vIFNvIEkgY3JlYXRlZCBhIGJsYWNrbGlzdCBvZiB1c2VyQWdlbnRzLiBZZXMsIHllcy4gQnJvd3NlciBzbmlmZmluZywgSSBrbm93LlxuLy8gQnV0IHdoYXQgdG8gZG8gd2hlbiBicm93c2VycyAqdGhlb3JldGljYWxseSogc3VwcG9ydCBhbiBBUEksIGJ1dCBjcmFzaFxuLy8gd2hlbiB1c2luZyBpdC5cbi8vXG4vLyBUaGlzIGlzIGEgbGlzdCBvZiByZWd1bGFyIGV4cHJlc3Npb25zIHRlc3RlZCBhZ2FpbnN0IG5hdmlnYXRvci51c2VyQWdlbnRcbi8vXG4vLyAqKiBJdCBzaG91bGQgb25seSBiZSB1c2VkIG9uIGJyb3dzZXIgdGhhdCAqZG8qIHN1cHBvcnQgdGhlIEFQSSwgYnV0XG4vLyBpbmNvcnJlY3RseSAqKlxuLy9cblxuXG5Ecm9wem9uZS5ibGFja2xpc3RlZEJyb3dzZXJzID0gWy8vIFRoZSBtYWMgb3MgYW5kIHdpbmRvd3MgcGhvbmUgdmVyc2lvbiBvZiBvcGVyYSAxMiBzZWVtcyB0byBoYXZlIGEgcHJvYmxlbSB3aXRoIHRoZSBGaWxlIGRyYWcnbidkcm9wIEFQSS5cbi9vcGVyYS4qKE1hY2ludG9zaHxXaW5kb3dzIFBob25lKS4qdmVyc2lvblxcLzEyL2ldOyAvLyBDaGVja3MgaWYgdGhlIGJyb3dzZXIgaXMgc3VwcG9ydGVkXG5cbkRyb3B6b25lLmlzQnJvd3NlclN1cHBvcnRlZCA9IGZ1bmN0aW9uICgpIHtcbiAgdmFyIGNhcGFibGVCcm93c2VyID0gdHJ1ZTtcblxuICBpZiAod2luZG93LkZpbGUgJiYgd2luZG93LkZpbGVSZWFkZXIgJiYgd2luZG93LkZpbGVMaXN0ICYmIHdpbmRvdy5CbG9iICYmIHdpbmRvdy5Gb3JtRGF0YSAmJiBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKSB7XG4gICAgaWYgKCEoXCJjbGFzc0xpc3RcIiBpbiBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiYVwiKSkpIHtcbiAgICAgIGNhcGFibGVCcm93c2VyID0gZmFsc2U7XG4gICAgfSBlbHNlIHtcbiAgICAgIC8vIFRoZSBicm93c2VyIHN1cHBvcnRzIHRoZSBBUEksIGJ1dCBtYXkgYmUgYmxhY2tsaXN0ZWQuXG4gICAgICB2YXIgX2l0ZXJhdG9yMzMgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihEcm9wem9uZS5ibGFja2xpc3RlZEJyb3dzZXJzKSxcbiAgICAgICAgICBfc3RlcDMzO1xuXG4gICAgICB0cnkge1xuICAgICAgICBmb3IgKF9pdGVyYXRvcjMzLnMoKTsgIShfc3RlcDMzID0gX2l0ZXJhdG9yMzMubigpKS5kb25lOykge1xuICAgICAgICAgIHZhciByZWdleCA9IF9zdGVwMzMudmFsdWU7XG5cbiAgICAgICAgICBpZiAocmVnZXgudGVzdChuYXZpZ2F0b3IudXNlckFnZW50KSkge1xuICAgICAgICAgICAgY2FwYWJsZUJyb3dzZXIgPSBmYWxzZTtcbiAgICAgICAgICAgIGNvbnRpbnVlO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgIF9pdGVyYXRvcjMzLmUoZXJyKTtcbiAgICAgIH0gZmluYWxseSB7XG4gICAgICAgIF9pdGVyYXRvcjMzLmYoKTtcbiAgICAgIH1cbiAgICB9XG4gIH0gZWxzZSB7XG4gICAgY2FwYWJsZUJyb3dzZXIgPSBmYWxzZTtcbiAgfVxuXG4gIHJldHVybiBjYXBhYmxlQnJvd3Nlcjtcbn07XG5cbkRyb3B6b25lLmRhdGFVUkl0b0Jsb2IgPSBmdW5jdGlvbiAoZGF0YVVSSSkge1xuICAvLyBjb252ZXJ0IGJhc2U2NCB0byByYXcgYmluYXJ5IGRhdGEgaGVsZCBpbiBhIHN0cmluZ1xuICAvLyBkb2Vzbid0IGhhbmRsZSBVUkxFbmNvZGVkIERhdGFVUklzIC0gc2VlIFNPIGFuc3dlciAjNjg1MDI3NiBmb3IgY29kZSB0aGF0IGRvZXMgdGhpc1xuICB2YXIgYnl0ZVN0cmluZyA9IGF0b2IoZGF0YVVSSS5zcGxpdCgnLCcpWzFdKTsgLy8gc2VwYXJhdGUgb3V0IHRoZSBtaW1lIGNvbXBvbmVudFxuXG4gIHZhciBtaW1lU3RyaW5nID0gZGF0YVVSSS5zcGxpdCgnLCcpWzBdLnNwbGl0KCc6JylbMV0uc3BsaXQoJzsnKVswXTsgLy8gd3JpdGUgdGhlIGJ5dGVzIG9mIHRoZSBzdHJpbmcgdG8gYW4gQXJyYXlCdWZmZXJcblxuICB2YXIgYWIgPSBuZXcgQXJyYXlCdWZmZXIoYnl0ZVN0cmluZy5sZW5ndGgpO1xuICB2YXIgaWEgPSBuZXcgVWludDhBcnJheShhYik7XG5cbiAgZm9yICh2YXIgaSA9IDAsIGVuZCA9IGJ5dGVTdHJpbmcubGVuZ3RoLCBhc2MgPSAwIDw9IGVuZDsgYXNjID8gaSA8PSBlbmQgOiBpID49IGVuZDsgYXNjID8gaSsrIDogaS0tKSB7XG4gICAgaWFbaV0gPSBieXRlU3RyaW5nLmNoYXJDb2RlQXQoaSk7XG4gIH0gLy8gd3JpdGUgdGhlIEFycmF5QnVmZmVyIHRvIGEgYmxvYlxuXG5cbiAgcmV0dXJuIG5ldyBCbG9iKFthYl0sIHtcbiAgICB0eXBlOiBtaW1lU3RyaW5nXG4gIH0pO1xufTsgLy8gUmV0dXJucyBhbiBhcnJheSB3aXRob3V0IHRoZSByZWplY3RlZCBpdGVtXG5cblxudmFyIHdpdGhvdXQgPSBmdW5jdGlvbiB3aXRob3V0KGxpc3QsIHJlamVjdGVkSXRlbSkge1xuICByZXR1cm4gbGlzdC5maWx0ZXIoZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICByZXR1cm4gaXRlbSAhPT0gcmVqZWN0ZWRJdGVtO1xuICB9KS5tYXAoZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICByZXR1cm4gaXRlbTtcbiAgfSk7XG59OyAvLyBhYmMtZGVmX2doaSAtPiBhYmNEZWZHaGlcblxuXG52YXIgY2FtZWxpemUgPSBmdW5jdGlvbiBjYW1lbGl6ZShzdHIpIHtcbiAgcmV0dXJuIHN0ci5yZXBsYWNlKC9bXFwtX10oXFx3KS9nLCBmdW5jdGlvbiAobWF0Y2gpIHtcbiAgICByZXR1cm4gbWF0Y2guY2hhckF0KDEpLnRvVXBwZXJDYXNlKCk7XG4gIH0pO1xufTsgLy8gQ3JlYXRlcyBhbiBlbGVtZW50IGZyb20gc3RyaW5nXG5cblxuRHJvcHpvbmUuY3JlYXRlRWxlbWVudCA9IGZ1bmN0aW9uIChzdHJpbmcpIHtcbiAgdmFyIGRpdiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJkaXZcIik7XG4gIGRpdi5pbm5lckhUTUwgPSBzdHJpbmc7XG4gIHJldHVybiBkaXYuY2hpbGROb2Rlc1swXTtcbn07IC8vIFRlc3RzIGlmIGdpdmVuIGVsZW1lbnQgaXMgaW5zaWRlIChvciBzaW1wbHkgaXMpIHRoZSBjb250YWluZXJcblxuXG5Ecm9wem9uZS5lbGVtZW50SW5zaWRlID0gZnVuY3Rpb24gKGVsZW1lbnQsIGNvbnRhaW5lcikge1xuICBpZiAoZWxlbWVudCA9PT0gY29udGFpbmVyKSB7XG4gICAgcmV0dXJuIHRydWU7XG4gIH0gLy8gQ29mZmVlc2NyaXB0IGRvZXNuJ3Qgc3VwcG9ydCBkby93aGlsZSBsb29wc1xuXG5cbiAgd2hpbGUgKGVsZW1lbnQgPSBlbGVtZW50LnBhcmVudE5vZGUpIHtcbiAgICBpZiAoZWxlbWVudCA9PT0gY29udGFpbmVyKSB7XG4gICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG4gIH1cblxuICByZXR1cm4gZmFsc2U7XG59O1xuXG5Ecm9wem9uZS5nZXRFbGVtZW50ID0gZnVuY3Rpb24gKGVsLCBuYW1lKSB7XG4gIHZhciBlbGVtZW50O1xuXG4gIGlmICh0eXBlb2YgZWwgPT09IFwic3RyaW5nXCIpIHtcbiAgICBlbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihlbCk7XG4gIH0gZWxzZSBpZiAoZWwubm9kZVR5cGUgIT0gbnVsbCkge1xuICAgIGVsZW1lbnQgPSBlbDtcbiAgfVxuXG4gIGlmIChlbGVtZW50ID09IG51bGwpIHtcbiAgICB0aHJvdyBuZXcgRXJyb3IoXCJJbnZhbGlkIGBcIi5jb25jYXQobmFtZSwgXCJgIG9wdGlvbiBwcm92aWRlZC4gUGxlYXNlIHByb3ZpZGUgYSBDU1Mgc2VsZWN0b3Igb3IgYSBwbGFpbiBIVE1MIGVsZW1lbnQuXCIpKTtcbiAgfVxuXG4gIHJldHVybiBlbGVtZW50O1xufTtcblxuRHJvcHpvbmUuZ2V0RWxlbWVudHMgPSBmdW5jdGlvbiAoZWxzLCBuYW1lKSB7XG4gIHZhciBlbCwgZWxlbWVudHM7XG5cbiAgaWYgKGVscyBpbnN0YW5jZW9mIEFycmF5KSB7XG4gICAgZWxlbWVudHMgPSBbXTtcblxuICAgIHRyeSB7XG4gICAgICB2YXIgX2l0ZXJhdG9yMzQgPSBfY3JlYXRlRm9yT2ZJdGVyYXRvckhlbHBlcihlbHMpLFxuICAgICAgICAgIF9zdGVwMzQ7XG5cbiAgICAgIHRyeSB7XG4gICAgICAgIGZvciAoX2l0ZXJhdG9yMzQucygpOyAhKF9zdGVwMzQgPSBfaXRlcmF0b3IzNC5uKCkpLmRvbmU7KSB7XG4gICAgICAgICAgZWwgPSBfc3RlcDM0LnZhbHVlO1xuICAgICAgICAgIGVsZW1lbnRzLnB1c2godGhpcy5nZXRFbGVtZW50KGVsLCBuYW1lKSk7XG4gICAgICAgIH1cbiAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICBfaXRlcmF0b3IzNC5lKGVycik7XG4gICAgICB9IGZpbmFsbHkge1xuICAgICAgICBfaXRlcmF0b3IzNC5mKCk7XG4gICAgICB9XG4gICAgfSBjYXRjaCAoZSkge1xuICAgICAgZWxlbWVudHMgPSBudWxsO1xuICAgIH1cbiAgfSBlbHNlIGlmICh0eXBlb2YgZWxzID09PSBcInN0cmluZ1wiKSB7XG4gICAgZWxlbWVudHMgPSBbXTtcblxuICAgIHZhciBfaXRlcmF0b3IzNSA9IF9jcmVhdGVGb3JPZkl0ZXJhdG9ySGVscGVyKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoZWxzKSksXG4gICAgICAgIF9zdGVwMzU7XG5cbiAgICB0cnkge1xuICAgICAgZm9yIChfaXRlcmF0b3IzNS5zKCk7ICEoX3N0ZXAzNSA9IF9pdGVyYXRvcjM1Lm4oKSkuZG9uZTspIHtcbiAgICAgICAgZWwgPSBfc3RlcDM1LnZhbHVlO1xuICAgICAgICBlbGVtZW50cy5wdXNoKGVsKTtcbiAgICAgIH1cbiAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgIF9pdGVyYXRvcjM1LmUoZXJyKTtcbiAgICB9IGZpbmFsbHkge1xuICAgICAgX2l0ZXJhdG9yMzUuZigpO1xuICAgIH1cbiAgfSBlbHNlIGlmIChlbHMubm9kZVR5cGUgIT0gbnVsbCkge1xuICAgIGVsZW1lbnRzID0gW2Vsc107XG4gIH1cblxuICBpZiAoZWxlbWVudHMgPT0gbnVsbCB8fCAhZWxlbWVudHMubGVuZ3RoKSB7XG4gICAgdGhyb3cgbmV3IEVycm9yKFwiSW52YWxpZCBgXCIuY29uY2F0KG5hbWUsIFwiYCBvcHRpb24gcHJvdmlkZWQuIFBsZWFzZSBwcm92aWRlIGEgQ1NTIHNlbGVjdG9yLCBhIHBsYWluIEhUTUwgZWxlbWVudCBvciBhIGxpc3Qgb2YgdGhvc2UuXCIpKTtcbiAgfVxuXG4gIHJldHVybiBlbGVtZW50cztcbn07IC8vIEFza3MgdGhlIHVzZXIgdGhlIHF1ZXN0aW9uIGFuZCBjYWxscyBhY2NlcHRlZCBvciByZWplY3RlZCBhY2NvcmRpbmdseVxuLy9cbi8vIFRoZSBkZWZhdWx0IGltcGxlbWVudGF0aW9uIGp1c3QgdXNlcyBgd2luZG93LmNvbmZpcm1gIGFuZCB0aGVuIGNhbGxzIHRoZVxuLy8gYXBwcm9wcmlhdGUgY2FsbGJhY2suXG5cblxuRHJvcHpvbmUuY29uZmlybSA9IGZ1bmN0aW9uIChxdWVzdGlvbiwgYWNjZXB0ZWQsIHJlamVjdGVkKSB7XG4gIGlmICh3aW5kb3cuY29uZmlybShxdWVzdGlvbikpIHtcbiAgICByZXR1cm4gYWNjZXB0ZWQoKTtcbiAgfSBlbHNlIGlmIChyZWplY3RlZCAhPSBudWxsKSB7XG4gICAgcmV0dXJuIHJlamVjdGVkKCk7XG4gIH1cbn07IC8vIFZhbGlkYXRlcyB0aGUgbWltZSB0eXBlIGxpa2UgdGhpczpcbi8vXG4vLyBodHRwczovL2RldmVsb3Blci5tb3ppbGxhLm9yZy9lbi1VUy9kb2NzL0hUTUwvRWxlbWVudC9pbnB1dCNhdHRyLWFjY2VwdFxuXG5cbkRyb3B6b25lLmlzVmFsaWRGaWxlID0gZnVuY3Rpb24gKGZpbGUsIGFjY2VwdGVkRmlsZXMpIHtcbiAgaWYgKCFhY2NlcHRlZEZpbGVzKSB7XG4gICAgcmV0dXJuIHRydWU7XG4gIH0gLy8gSWYgdGhlcmUgYXJlIG5vIGFjY2VwdGVkIG1pbWUgdHlwZXMsIGl0J3MgT0tcblxuXG4gIGFjY2VwdGVkRmlsZXMgPSBhY2NlcHRlZEZpbGVzLnNwbGl0KFwiLFwiKTtcbiAgdmFyIG1pbWVUeXBlID0gZmlsZS50eXBlO1xuICB2YXIgYmFzZU1pbWVUeXBlID0gbWltZVR5cGUucmVwbGFjZSgvXFwvLiokLywgXCJcIik7XG5cbiAgdmFyIF9pdGVyYXRvcjM2ID0gX2NyZWF0ZUZvck9mSXRlcmF0b3JIZWxwZXIoYWNjZXB0ZWRGaWxlcyksXG4gICAgICBfc3RlcDM2O1xuXG4gIHRyeSB7XG4gICAgZm9yIChfaXRlcmF0b3IzNi5zKCk7ICEoX3N0ZXAzNiA9IF9pdGVyYXRvcjM2Lm4oKSkuZG9uZTspIHtcbiAgICAgIHZhciB2YWxpZFR5cGUgPSBfc3RlcDM2LnZhbHVlO1xuICAgICAgdmFsaWRUeXBlID0gdmFsaWRUeXBlLnRyaW0oKTtcblxuICAgICAgaWYgKHZhbGlkVHlwZS5jaGFyQXQoMCkgPT09IFwiLlwiKSB7XG4gICAgICAgIGlmIChmaWxlLm5hbWUudG9Mb3dlckNhc2UoKS5pbmRleE9mKHZhbGlkVHlwZS50b0xvd2VyQ2FzZSgpLCBmaWxlLm5hbWUubGVuZ3RoIC0gdmFsaWRUeXBlLmxlbmd0aCkgIT09IC0xKSB7XG4gICAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICAgIH1cbiAgICAgIH0gZWxzZSBpZiAoL1xcL1xcKiQvLnRlc3QodmFsaWRUeXBlKSkge1xuICAgICAgICAvLyBUaGlzIGlzIHNvbWV0aGluZyBsaWtlIGEgaW1hZ2UvKiBtaW1lIHR5cGVcbiAgICAgICAgaWYgKGJhc2VNaW1lVHlwZSA9PT0gdmFsaWRUeXBlLnJlcGxhY2UoL1xcLy4qJC8sIFwiXCIpKSB7XG4gICAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICAgIH1cbiAgICAgIH0gZWxzZSB7XG4gICAgICAgIGlmIChtaW1lVHlwZSA9PT0gdmFsaWRUeXBlKSB7XG4gICAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9XG4gIH0gY2F0Y2ggKGVycikge1xuICAgIF9pdGVyYXRvcjM2LmUoZXJyKTtcbiAgfSBmaW5hbGx5IHtcbiAgICBfaXRlcmF0b3IzNi5mKCk7XG4gIH1cblxuICByZXR1cm4gZmFsc2U7XG59OyAvLyBBdWdtZW50IGpRdWVyeVxuXG5cbmlmICh0eXBlb2YgalF1ZXJ5ICE9PSAndW5kZWZpbmVkJyAmJiBqUXVlcnkgIT09IG51bGwpIHtcbiAgalF1ZXJ5LmZuLmRyb3B6b25lID0gZnVuY3Rpb24gKG9wdGlvbnMpIHtcbiAgICByZXR1cm4gdGhpcy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgIHJldHVybiBuZXcgRHJvcHpvbmUodGhpcywgb3B0aW9ucyk7XG4gICAgfSk7XG4gIH07XG59XG5cbmlmICh0eXBlb2YgbW9kdWxlICE9PSAndW5kZWZpbmVkJyAmJiBtb2R1bGUgIT09IG51bGwpIHtcbiAgbW9kdWxlLmV4cG9ydHMgPSBEcm9wem9uZTtcbn0gZWxzZSB7XG4gIHdpbmRvdy5Ecm9wem9uZSA9IERyb3B6b25lO1xufSAvLyBEcm9wem9uZSBmaWxlIHN0YXR1cyBjb2Rlc1xuXG5cbkRyb3B6b25lLkFEREVEID0gXCJhZGRlZFwiO1xuRHJvcHpvbmUuUVVFVUVEID0gXCJxdWV1ZWRcIjsgLy8gRm9yIGJhY2t3YXJkcyBjb21wYXRpYmlsaXR5LiBOb3csIGlmIGEgZmlsZSBpcyBhY2NlcHRlZCwgaXQncyBlaXRoZXIgcXVldWVkXG4vLyBvciB1cGxvYWRpbmcuXG5cbkRyb3B6b25lLkFDQ0VQVEVEID0gRHJvcHpvbmUuUVVFVUVEO1xuRHJvcHpvbmUuVVBMT0FESU5HID0gXCJ1cGxvYWRpbmdcIjtcbkRyb3B6b25lLlBST0NFU1NJTkcgPSBEcm9wem9uZS5VUExPQURJTkc7IC8vIGFsaWFzXG5cbkRyb3B6b25lLkNBTkNFTEVEID0gXCJjYW5jZWxlZFwiO1xuRHJvcHpvbmUuRVJST1IgPSBcImVycm9yXCI7XG5Ecm9wem9uZS5TVUNDRVNTID0gXCJzdWNjZXNzXCI7XG4vKlxuXG4gQnVnZml4IGZvciBpT1MgNiBhbmQgN1xuIFNvdXJjZTogaHR0cDovL3N0YWNrb3ZlcmZsb3cuY29tL3F1ZXN0aW9ucy8xMTkyOTA5OS9odG1sNS1jYW52YXMtZHJhd2ltYWdlLXJhdGlvLWJ1Zy1pb3NcbiBiYXNlZCBvbiB0aGUgd29yayBvZiBodHRwczovL2dpdGh1Yi5jb20vc3RvbWl0YS9pb3MtaW1hZ2VmaWxlLW1lZ2FwaXhlbFxuXG4gKi9cbi8vIERldGVjdGluZyB2ZXJ0aWNhbCBzcXVhc2ggaW4gbG9hZGVkIGltYWdlLlxuLy8gRml4ZXMgYSBidWcgd2hpY2ggc3F1YXNoIGltYWdlIHZlcnRpY2FsbHkgd2hpbGUgZHJhd2luZyBpbnRvIGNhbnZhcyBmb3Igc29tZSBpbWFnZXMuXG4vLyBUaGlzIGlzIGEgYnVnIGluIGlPUzYgZGV2aWNlcy4gVGhpcyBmdW5jdGlvbiBmcm9tIGh0dHBzOi8vZ2l0aHViLmNvbS9zdG9taXRhL2lvcy1pbWFnZWZpbGUtbWVnYXBpeGVsXG5cbnZhciBkZXRlY3RWZXJ0aWNhbFNxdWFzaCA9IGZ1bmN0aW9uIGRldGVjdFZlcnRpY2FsU3F1YXNoKGltZykge1xuICB2YXIgaXcgPSBpbWcubmF0dXJhbFdpZHRoO1xuICB2YXIgaWggPSBpbWcubmF0dXJhbEhlaWdodDtcbiAgdmFyIGNhbnZhcyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJjYW52YXNcIik7XG4gIGNhbnZhcy53aWR0aCA9IDE7XG4gIGNhbnZhcy5oZWlnaHQgPSBpaDtcbiAgdmFyIGN0eCA9IGNhbnZhcy5nZXRDb250ZXh0KFwiMmRcIik7XG4gIGN0eC5kcmF3SW1hZ2UoaW1nLCAwLCAwKTtcblxuICB2YXIgX2N0eCRnZXRJbWFnZURhdGEgPSBjdHguZ2V0SW1hZ2VEYXRhKDEsIDAsIDEsIGloKSxcbiAgICAgIGRhdGEgPSBfY3R4JGdldEltYWdlRGF0YS5kYXRhOyAvLyBzZWFyY2ggaW1hZ2UgZWRnZSBwaXhlbCBwb3NpdGlvbiBpbiBjYXNlIGl0IGlzIHNxdWFzaGVkIHZlcnRpY2FsbHkuXG5cblxuICB2YXIgc3kgPSAwO1xuICB2YXIgZXkgPSBpaDtcbiAgdmFyIHB5ID0gaWg7XG5cbiAgd2hpbGUgKHB5ID4gc3kpIHtcbiAgICB2YXIgYWxwaGEgPSBkYXRhWyhweSAtIDEpICogNCArIDNdO1xuXG4gICAgaWYgKGFscGhhID09PSAwKSB7XG4gICAgICBleSA9IHB5O1xuICAgIH0gZWxzZSB7XG4gICAgICBzeSA9IHB5O1xuICAgIH1cblxuICAgIHB5ID0gZXkgKyBzeSA+PiAxO1xuICB9XG5cbiAgdmFyIHJhdGlvID0gcHkgLyBpaDtcblxuICBpZiAocmF0aW8gPT09IDApIHtcbiAgICByZXR1cm4gMTtcbiAgfSBlbHNlIHtcbiAgICByZXR1cm4gcmF0aW87XG4gIH1cbn07IC8vIEEgcmVwbGFjZW1lbnQgZm9yIGNvbnRleHQuZHJhd0ltYWdlXG4vLyAoYXJncyBhcmUgZm9yIHNvdXJjZSBhbmQgZGVzdGluYXRpb24pLlxuXG5cbnZhciBkcmF3SW1hZ2VJT1NGaXggPSBmdW5jdGlvbiBkcmF3SW1hZ2VJT1NGaXgoY3R4LCBpbWcsIHN4LCBzeSwgc3csIHNoLCBkeCwgZHksIGR3LCBkaCkge1xuICB2YXIgdmVydFNxdWFzaFJhdGlvID0gZGV0ZWN0VmVydGljYWxTcXVhc2goaW1nKTtcbiAgcmV0dXJuIGN0eC5kcmF3SW1hZ2UoaW1nLCBzeCwgc3ksIHN3LCBzaCwgZHgsIGR5LCBkdywgZGggLyB2ZXJ0U3F1YXNoUmF0aW8pO1xufTsgLy8gQmFzZWQgb24gTWluaWZ5SnBlZ1xuLy8gU291cmNlOiBodHRwOi8vd3d3LnBlcnJ5LmN6L2ZpbGVzL0V4aWZSZXN0b3Jlci5qc1xuLy8gaHR0cDovL2VsaWNvbi5ibG9nNTcuZmMyLmNvbS9ibG9nLWVudHJ5LTIwNi5odG1sXG5cblxudmFyIEV4aWZSZXN0b3JlID0gLyojX19QVVJFX18qL2Z1bmN0aW9uICgpIHtcbiAgZnVuY3Rpb24gRXhpZlJlc3RvcmUoKSB7XG4gICAgX2NsYXNzQ2FsbENoZWNrKHRoaXMsIEV4aWZSZXN0b3JlKTtcbiAgfVxuXG4gIF9jcmVhdGVDbGFzcyhFeGlmUmVzdG9yZSwgbnVsbCwgW3tcbiAgICBrZXk6IFwiaW5pdENsYXNzXCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGluaXRDbGFzcygpIHtcbiAgICAgIHRoaXMuS0VZX1NUUiA9ICdBQkNERUZHSElKS0xNTk9QUVJTVFVWV1hZWmFiY2RlZmdoaWprbG1ub3BxcnN0dXZ3eHl6MDEyMzQ1Njc4OSsvPSc7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImVuY29kZTY0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGVuY29kZTY0KGlucHV0KSB7XG4gICAgICB2YXIgb3V0cHV0ID0gJyc7XG4gICAgICB2YXIgY2hyMSA9IHVuZGVmaW5lZDtcbiAgICAgIHZhciBjaHIyID0gdW5kZWZpbmVkO1xuICAgICAgdmFyIGNocjMgPSAnJztcbiAgICAgIHZhciBlbmMxID0gdW5kZWZpbmVkO1xuICAgICAgdmFyIGVuYzIgPSB1bmRlZmluZWQ7XG4gICAgICB2YXIgZW5jMyA9IHVuZGVmaW5lZDtcbiAgICAgIHZhciBlbmM0ID0gJyc7XG4gICAgICB2YXIgaSA9IDA7XG5cbiAgICAgIHdoaWxlICh0cnVlKSB7XG4gICAgICAgIGNocjEgPSBpbnB1dFtpKytdO1xuICAgICAgICBjaHIyID0gaW5wdXRbaSsrXTtcbiAgICAgICAgY2hyMyA9IGlucHV0W2krK107XG4gICAgICAgIGVuYzEgPSBjaHIxID4+IDI7XG4gICAgICAgIGVuYzIgPSAoY2hyMSAmIDMpIDw8IDQgfCBjaHIyID4+IDQ7XG4gICAgICAgIGVuYzMgPSAoY2hyMiAmIDE1KSA8PCAyIHwgY2hyMyA+PiA2O1xuICAgICAgICBlbmM0ID0gY2hyMyAmIDYzO1xuXG4gICAgICAgIGlmIChpc05hTihjaHIyKSkge1xuICAgICAgICAgIGVuYzMgPSBlbmM0ID0gNjQ7XG4gICAgICAgIH0gZWxzZSBpZiAoaXNOYU4oY2hyMykpIHtcbiAgICAgICAgICBlbmM0ID0gNjQ7XG4gICAgICAgIH1cblxuICAgICAgICBvdXRwdXQgPSBvdXRwdXQgKyB0aGlzLktFWV9TVFIuY2hhckF0KGVuYzEpICsgdGhpcy5LRVlfU1RSLmNoYXJBdChlbmMyKSArIHRoaXMuS0VZX1NUUi5jaGFyQXQoZW5jMykgKyB0aGlzLktFWV9TVFIuY2hhckF0KGVuYzQpO1xuICAgICAgICBjaHIxID0gY2hyMiA9IGNocjMgPSAnJztcbiAgICAgICAgZW5jMSA9IGVuYzIgPSBlbmMzID0gZW5jNCA9ICcnO1xuXG4gICAgICAgIGlmICghKGkgPCBpbnB1dC5sZW5ndGgpKSB7XG4gICAgICAgICAgYnJlYWs7XG4gICAgICAgIH1cbiAgICAgIH1cblxuICAgICAgcmV0dXJuIG91dHB1dDtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwicmVzdG9yZVwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiByZXN0b3JlKG9yaWdGaWxlQmFzZTY0LCByZXNpemVkRmlsZUJhc2U2NCkge1xuICAgICAgaWYgKCFvcmlnRmlsZUJhc2U2NC5tYXRjaCgnZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwnKSkge1xuICAgICAgICByZXR1cm4gcmVzaXplZEZpbGVCYXNlNjQ7XG4gICAgICB9XG5cbiAgICAgIHZhciByYXdJbWFnZSA9IHRoaXMuZGVjb2RlNjQob3JpZ0ZpbGVCYXNlNjQucmVwbGFjZSgnZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwnLCAnJykpO1xuICAgICAgdmFyIHNlZ21lbnRzID0gdGhpcy5zbGljZTJTZWdtZW50cyhyYXdJbWFnZSk7XG4gICAgICB2YXIgaW1hZ2UgPSB0aGlzLmV4aWZNYW5pcHVsYXRpb24ocmVzaXplZEZpbGVCYXNlNjQsIHNlZ21lbnRzKTtcbiAgICAgIHJldHVybiBcImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsXCIuY29uY2F0KHRoaXMuZW5jb2RlNjQoaW1hZ2UpKTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiZXhpZk1hbmlwdWxhdGlvblwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBleGlmTWFuaXB1bGF0aW9uKHJlc2l6ZWRGaWxlQmFzZTY0LCBzZWdtZW50cykge1xuICAgICAgdmFyIGV4aWZBcnJheSA9IHRoaXMuZ2V0RXhpZkFycmF5KHNlZ21lbnRzKTtcbiAgICAgIHZhciBuZXdJbWFnZUFycmF5ID0gdGhpcy5pbnNlcnRFeGlmKHJlc2l6ZWRGaWxlQmFzZTY0LCBleGlmQXJyYXkpO1xuICAgICAgdmFyIGFCdWZmZXIgPSBuZXcgVWludDhBcnJheShuZXdJbWFnZUFycmF5KTtcbiAgICAgIHJldHVybiBhQnVmZmVyO1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJnZXRFeGlmQXJyYXlcIixcbiAgICB2YWx1ZTogZnVuY3Rpb24gZ2V0RXhpZkFycmF5KHNlZ21lbnRzKSB7XG4gICAgICB2YXIgc2VnID0gdW5kZWZpbmVkO1xuICAgICAgdmFyIHggPSAwO1xuXG4gICAgICB3aGlsZSAoeCA8IHNlZ21lbnRzLmxlbmd0aCkge1xuICAgICAgICBzZWcgPSBzZWdtZW50c1t4XTtcblxuICAgICAgICBpZiAoc2VnWzBdID09PSAyNTUgJiBzZWdbMV0gPT09IDIyNSkge1xuICAgICAgICAgIHJldHVybiBzZWc7XG4gICAgICAgIH1cblxuICAgICAgICB4Kys7XG4gICAgICB9XG5cbiAgICAgIHJldHVybiBbXTtcbiAgICB9XG4gIH0sIHtcbiAgICBrZXk6IFwiaW5zZXJ0RXhpZlwiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBpbnNlcnRFeGlmKHJlc2l6ZWRGaWxlQmFzZTY0LCBleGlmQXJyYXkpIHtcbiAgICAgIHZhciBpbWFnZURhdGEgPSByZXNpemVkRmlsZUJhc2U2NC5yZXBsYWNlKCdkYXRhOmltYWdlL2pwZWc7YmFzZTY0LCcsICcnKTtcbiAgICAgIHZhciBidWYgPSB0aGlzLmRlY29kZTY0KGltYWdlRGF0YSk7XG4gICAgICB2YXIgc2VwYXJhdGVQb2ludCA9IGJ1Zi5pbmRleE9mKDI1NSwgMyk7XG4gICAgICB2YXIgbWFlID0gYnVmLnNsaWNlKDAsIHNlcGFyYXRlUG9pbnQpO1xuICAgICAgdmFyIGF0byA9IGJ1Zi5zbGljZShzZXBhcmF0ZVBvaW50KTtcbiAgICAgIHZhciBhcnJheSA9IG1hZTtcbiAgICAgIGFycmF5ID0gYXJyYXkuY29uY2F0KGV4aWZBcnJheSk7XG4gICAgICBhcnJheSA9IGFycmF5LmNvbmNhdChhdG8pO1xuICAgICAgcmV0dXJuIGFycmF5O1xuICAgIH1cbiAgfSwge1xuICAgIGtleTogXCJzbGljZTJTZWdtZW50c1wiLFxuICAgIHZhbHVlOiBmdW5jdGlvbiBzbGljZTJTZWdtZW50cyhyYXdJbWFnZUFycmF5KSB7XG4gICAgICB2YXIgaGVhZCA9IDA7XG4gICAgICB2YXIgc2VnbWVudHMgPSBbXTtcblxuICAgICAgd2hpbGUgKHRydWUpIHtcbiAgICAgICAgdmFyIGxlbmd0aDtcblxuICAgICAgICBpZiAocmF3SW1hZ2VBcnJheVtoZWFkXSA9PT0gMjU1ICYgcmF3SW1hZ2VBcnJheVtoZWFkICsgMV0gPT09IDIxOCkge1xuICAgICAgICAgIGJyZWFrO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKHJhd0ltYWdlQXJyYXlbaGVhZF0gPT09IDI1NSAmIHJhd0ltYWdlQXJyYXlbaGVhZCArIDFdID09PSAyMTYpIHtcbiAgICAgICAgICBoZWFkICs9IDI7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgbGVuZ3RoID0gcmF3SW1hZ2VBcnJheVtoZWFkICsgMl0gKiAyNTYgKyByYXdJbWFnZUFycmF5W2hlYWQgKyAzXTtcbiAgICAgICAgICB2YXIgZW5kUG9pbnQgPSBoZWFkICsgbGVuZ3RoICsgMjtcbiAgICAgICAgICB2YXIgc2VnID0gcmF3SW1hZ2VBcnJheS5zbGljZShoZWFkLCBlbmRQb2ludCk7XG4gICAgICAgICAgc2VnbWVudHMucHVzaChzZWcpO1xuICAgICAgICAgIGhlYWQgPSBlbmRQb2ludDtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmIChoZWFkID4gcmF3SW1hZ2VBcnJheS5sZW5ndGgpIHtcbiAgICAgICAgICBicmVhaztcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICByZXR1cm4gc2VnbWVudHM7XG4gICAgfVxuICB9LCB7XG4gICAga2V5OiBcImRlY29kZTY0XCIsXG4gICAgdmFsdWU6IGZ1bmN0aW9uIGRlY29kZTY0KGlucHV0KSB7XG4gICAgICB2YXIgb3V0cHV0ID0gJyc7XG4gICAgICB2YXIgY2hyMSA9IHVuZGVmaW5lZDtcbiAgICAgIHZhciBjaHIyID0gdW5kZWZpbmVkO1xuICAgICAgdmFyIGNocjMgPSAnJztcbiAgICAgIHZhciBlbmMxID0gdW5kZWZpbmVkO1xuICAgICAgdmFyIGVuYzIgPSB1bmRlZmluZWQ7XG4gICAgICB2YXIgZW5jMyA9IHVuZGVmaW5lZDtcbiAgICAgIHZhciBlbmM0ID0gJyc7XG4gICAgICB2YXIgaSA9IDA7XG4gICAgICB2YXIgYnVmID0gW107IC8vIHJlbW92ZSBhbGwgY2hhcmFjdGVycyB0aGF0IGFyZSBub3QgQS1aLCBhLXosIDAtOSwgKywgLywgb3IgPVxuXG4gICAgICB2YXIgYmFzZTY0dGVzdCA9IC9bXkEtWmEtejAtOVxcK1xcL1xcPV0vZztcblxuICAgICAgaWYgKGJhc2U2NHRlc3QuZXhlYyhpbnB1dCkpIHtcbiAgICAgICAgY29uc29sZS53YXJuKCdUaGVyZSB3ZXJlIGludmFsaWQgYmFzZTY0IGNoYXJhY3RlcnMgaW4gdGhlIGlucHV0IHRleHQuXFxuVmFsaWQgYmFzZTY0IGNoYXJhY3RlcnMgYXJlIEEtWiwgYS16LCAwLTksIFxcJytcXCcsIFxcJy9cXCcsYW5kIFxcJz1cXCdcXG5FeHBlY3QgZXJyb3JzIGluIGRlY29kaW5nLicpO1xuICAgICAgfVxuXG4gICAgICBpbnB1dCA9IGlucHV0LnJlcGxhY2UoL1teQS1aYS16MC05XFwrXFwvXFw9XS9nLCAnJyk7XG5cbiAgICAgIHdoaWxlICh0cnVlKSB7XG4gICAgICAgIGVuYzEgPSB0aGlzLktFWV9TVFIuaW5kZXhPZihpbnB1dC5jaGFyQXQoaSsrKSk7XG4gICAgICAgIGVuYzIgPSB0aGlzLktFWV9TVFIuaW5kZXhPZihpbnB1dC5jaGFyQXQoaSsrKSk7XG4gICAgICAgIGVuYzMgPSB0aGlzLktFWV9TVFIuaW5kZXhPZihpbnB1dC5jaGFyQXQoaSsrKSk7XG4gICAgICAgIGVuYzQgPSB0aGlzLktFWV9TVFIuaW5kZXhPZihpbnB1dC5jaGFyQXQoaSsrKSk7XG4gICAgICAgIGNocjEgPSBlbmMxIDw8IDIgfCBlbmMyID4+IDQ7XG4gICAgICAgIGNocjIgPSAoZW5jMiAmIDE1KSA8PCA0IHwgZW5jMyA+PiAyO1xuICAgICAgICBjaHIzID0gKGVuYzMgJiAzKSA8PCA2IHwgZW5jNDtcbiAgICAgICAgYnVmLnB1c2goY2hyMSk7XG5cbiAgICAgICAgaWYgKGVuYzMgIT09IDY0KSB7XG4gICAgICAgICAgYnVmLnB1c2goY2hyMik7XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoZW5jNCAhPT0gNjQpIHtcbiAgICAgICAgICBidWYucHVzaChjaHIzKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGNocjEgPSBjaHIyID0gY2hyMyA9ICcnO1xuICAgICAgICBlbmMxID0gZW5jMiA9IGVuYzMgPSBlbmM0ID0gJyc7XG5cbiAgICAgICAgaWYgKCEoaSA8IGlucHV0Lmxlbmd0aCkpIHtcbiAgICAgICAgICBicmVhaztcbiAgICAgICAgfVxuICAgICAgfVxuXG4gICAgICByZXR1cm4gYnVmO1xuICAgIH1cbiAgfV0pO1xuXG4gIHJldHVybiBFeGlmUmVzdG9yZTtcbn0oKTtcblxuRXhpZlJlc3RvcmUuaW5pdENsYXNzKCk7XG4vKlxuICogY29udGVudGxvYWRlZC5qc1xuICpcbiAqIEF1dGhvcjogRGllZ28gUGVyaW5pIChkaWVnby5wZXJpbmkgYXQgZ21haWwuY29tKVxuICogU3VtbWFyeTogY3Jvc3MtYnJvd3NlciB3cmFwcGVyIGZvciBET01Db250ZW50TG9hZGVkXG4gKiBVcGRhdGVkOiAyMDEwMTAyMFxuICogTGljZW5zZTogTUlUXG4gKiBWZXJzaW9uOiAxLjJcbiAqXG4gKiBVUkw6XG4gKiBodHRwOi8vamF2YXNjcmlwdC5ud2JveC5jb20vQ29udGVudExvYWRlZC9cbiAqIGh0dHA6Ly9qYXZhc2NyaXB0Lm53Ym94LmNvbS9Db250ZW50TG9hZGVkL01JVC1MSUNFTlNFXG4gKi9cbi8vIEB3aW4gd2luZG93IHJlZmVyZW5jZVxuLy8gQGZuIGZ1bmN0aW9uIHJlZmVyZW5jZVxuXG52YXIgY29udGVudExvYWRlZCA9IGZ1bmN0aW9uIGNvbnRlbnRMb2FkZWQod2luLCBmbikge1xuICB2YXIgZG9uZSA9IGZhbHNlO1xuICB2YXIgdG9wID0gdHJ1ZTtcbiAgdmFyIGRvYyA9IHdpbi5kb2N1bWVudDtcbiAgdmFyIHJvb3QgPSBkb2MuZG9jdW1lbnRFbGVtZW50O1xuICB2YXIgYWRkID0gZG9jLmFkZEV2ZW50TGlzdGVuZXIgPyBcImFkZEV2ZW50TGlzdGVuZXJcIiA6IFwiYXR0YWNoRXZlbnRcIjtcbiAgdmFyIHJlbSA9IGRvYy5hZGRFdmVudExpc3RlbmVyID8gXCJyZW1vdmVFdmVudExpc3RlbmVyXCIgOiBcImRldGFjaEV2ZW50XCI7XG4gIHZhciBwcmUgPSBkb2MuYWRkRXZlbnRMaXN0ZW5lciA/IFwiXCIgOiBcIm9uXCI7XG5cbiAgdmFyIGluaXQgPSBmdW5jdGlvbiBpbml0KGUpIHtcbiAgICBpZiAoZS50eXBlID09PSBcInJlYWR5c3RhdGVjaGFuZ2VcIiAmJiBkb2MucmVhZHlTdGF0ZSAhPT0gXCJjb21wbGV0ZVwiKSB7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgKGUudHlwZSA9PT0gXCJsb2FkXCIgPyB3aW4gOiBkb2MpW3JlbV0ocHJlICsgZS50eXBlLCBpbml0LCBmYWxzZSk7XG5cbiAgICBpZiAoIWRvbmUgJiYgKGRvbmUgPSB0cnVlKSkge1xuICAgICAgcmV0dXJuIGZuLmNhbGwod2luLCBlLnR5cGUgfHwgZSk7XG4gICAgfVxuICB9O1xuXG4gIHZhciBwb2xsID0gZnVuY3Rpb24gcG9sbCgpIHtcbiAgICB0cnkge1xuICAgICAgcm9vdC5kb1Njcm9sbChcImxlZnRcIik7XG4gICAgfSBjYXRjaCAoZSkge1xuICAgICAgc2V0VGltZW91dChwb2xsLCA1MCk7XG4gICAgICByZXR1cm47XG4gICAgfVxuXG4gICAgcmV0dXJuIGluaXQoXCJwb2xsXCIpO1xuICB9O1xuXG4gIGlmIChkb2MucmVhZHlTdGF0ZSAhPT0gXCJjb21wbGV0ZVwiKSB7XG4gICAgaWYgKGRvYy5jcmVhdGVFdmVudE9iamVjdCAmJiByb290LmRvU2Nyb2xsKSB7XG4gICAgICB0cnkge1xuICAgICAgICB0b3AgPSAhd2luLmZyYW1lRWxlbWVudDtcbiAgICAgIH0gY2F0Y2ggKGVycm9yKSB7fVxuXG4gICAgICBpZiAodG9wKSB7XG4gICAgICAgIHBvbGwoKTtcbiAgICAgIH1cbiAgICB9XG5cbiAgICBkb2NbYWRkXShwcmUgKyBcIkRPTUNvbnRlbnRMb2FkZWRcIiwgaW5pdCwgZmFsc2UpO1xuICAgIGRvY1thZGRdKHByZSArIFwicmVhZHlzdGF0ZWNoYW5nZVwiLCBpbml0LCBmYWxzZSk7XG4gICAgcmV0dXJuIHdpblthZGRdKHByZSArIFwibG9hZFwiLCBpbml0LCBmYWxzZSk7XG4gIH1cbn07IC8vIEFzIGEgc2luZ2xlIGZ1bmN0aW9uIHRvIGJlIGFibGUgdG8gd3JpdGUgdGVzdHMuXG5cblxuRHJvcHpvbmUuX2F1dG9EaXNjb3ZlckZ1bmN0aW9uID0gZnVuY3Rpb24gKCkge1xuICBpZiAoRHJvcHpvbmUuYXV0b0Rpc2NvdmVyKSB7XG4gICAgcmV0dXJuIERyb3B6b25lLmRpc2NvdmVyKCk7XG4gIH1cbn07XG5cbmNvbnRlbnRMb2FkZWQod2luZG93LCBEcm9wem9uZS5fYXV0b0Rpc2NvdmVyRnVuY3Rpb24pO1xuXG5mdW5jdGlvbiBfX2d1YXJkX18odmFsdWUsIHRyYW5zZm9ybSkge1xuICByZXR1cm4gdHlwZW9mIHZhbHVlICE9PSAndW5kZWZpbmVkJyAmJiB2YWx1ZSAhPT0gbnVsbCA/IHRyYW5zZm9ybSh2YWx1ZSkgOiB1bmRlZmluZWQ7XG59XG5cbmZ1bmN0aW9uIF9fZ3VhcmRNZXRob2RfXyhvYmosIG1ldGhvZE5hbWUsIHRyYW5zZm9ybSkge1xuICBpZiAodHlwZW9mIG9iaiAhPT0gJ3VuZGVmaW5lZCcgJiYgb2JqICE9PSBudWxsICYmIHR5cGVvZiBvYmpbbWV0aG9kTmFtZV0gPT09ICdmdW5jdGlvbicpIHtcbiAgICByZXR1cm4gdHJhbnNmb3JtKG9iaiwgbWV0aG9kTmFtZSk7XG4gIH0gZWxzZSB7XG4gICAgcmV0dXJuIHVuZGVmaW5lZDtcbiAgfVxufVxuIl0sInNvdXJjZVJvb3QiOiIifQ==
//# sourceURL=webpack-internal:///./node_modules/dropzone/dist/dropzone.js