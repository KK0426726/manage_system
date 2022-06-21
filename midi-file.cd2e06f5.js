(window.webpackJsonp = window.webpackJsonp || []).push([[13], {
    184: function (e, t, n) {
        var a = n(419);
        "string" == typeof a && (a = [[e.i, a, ""]]),
            a.locals && (e.exports = a.locals); (0, n(22).
                default)("7d4178a5", a, !1, {
                    sourceMap: !1
                })
    },
    418: function (e, t, n) {
        "use strict";
        n(184)
    },
    419: function (e, t, n) {
        (t = n(21)(!1)).push([e.i, ".panel-midifile{margin:0 1em;font-size:14px}.panel-midifile>.player-wp{max-width:500px;padding:2em 0;margin:0 auto}.panel-midifile>.player-wp>.file-upload{position:relative;min-height:120px;border:1px dashed rgba(0,0,0,.267);border-radius:5px;background:rgba(245,246,247,.667);cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.panel-midifile>.player-wp>.file-upload:hover{background-color:rgba(242,243,244,.667)}.panel-midifile>.player-wp>.file-upload:active{background-color:rgba(239,240,241,.667)}.panel-midifile>.player-wp>.file-upload>.tips-text{position:absolute;z-index:1;font-size:14px;top:50%;left:0;width:100%;text-align:center;color:rgba(0,0,0,.533);font-weight:700;text-shadow:0 0 2px hsla(0,0%,100%,.533);transform:translateY(-50%)}.panel-midifile>.player-wp>.player-control{padding:1em 0}.panel-midifile>.player-wp>.player-control>.play-btns{text-align:center}.panel-midifile>.player-wp>.player-control>.play-info{text-align:center;padding:.8em 0}.panel-midifile>.player-wp>.player-control>.meta-info>div{margin:0 0 0 50px;word-break:break-all}.panel-midifile>.player-wp>.player-control>.meta-info>div>.name{font-size:12px;color:rgba(0,0,0,.467);margin:0 0 0 -50px}.panel-midifile>.player-wp>.player-control>.meta-info>div>.value{margin:0 0 0 1em;font-size:14px;color:rgba(0,0,0,.733)}", ""]),
        e.exports = t
    },
    483: function (e, t, n) {
        "use strict";
        n.r(t);
        var a = function () {
           var e = this,
                n = e._c;
            return n("div", {
                staticClass: "panel-midifile"
            },
                [n("div", {
                    staticClass: "player-wp"
                },
                    [n("div", {
                        staticClass: "file-upload",
                        on: {
                            dragenter: function (e) {
                                e.preventDefault(),
                                    e.stopPropagation()
                            },
                            dragleave: function (e) {
                                e.preventDefault(),
                                    e.stopPropagation()
                            },
                            dragover: function (e) {
                                e.preventDefault(),
                                    e.stopPropagation()
                            },
                           
                            click: e.selectFile
                        }
                    },
                        [n("div", {
                            staticClass: "tips-text"
                        },
                            [e._v("换你喜欢的背景音乐")])]), n("div", [e._v("只能播放midi文件哦~~~~~~~~~")]), n("div", {
                                staticClass: "player-control"
                            },
                                [n("xw-button-group", {
                                    staticClass: "play-btns"
                                },
                                    [n("xw-button", {
                                        attrs: {
                                            icon: "play",
                                            id: "a"
                                        },
                                        on: {
                                            click: e.play
                                        }
                                    },
                                        [e._v("\n                    Come some music\n                ")]), n("xw-button", {
                                            attrs: {
                                                icon: "pause"
                                            },

                                            on: {
                                                click: e.stop
                                            }
                                        },
                                            [e._v("\n                    木得音乐\n                ")])], 1), n("div", {
                                                staticClass: "play-info"
                                            },
                                                [n("span", {
                                                    staticClass: "time"
                                                },
                                                    [e.playInfo.playing ? n("span", [e._v("")]) : e._e(), e._v("")])]), n("div", {
                                                        staticClass: "meta-info"
                                                    },
                                                        e._l(e.playInfo.metaInfo, (function (t, a) {
                                                            n("div", {
                                                                key: a
                                                            },
                                                                [n("span", {
                                                                    staticClass: "name"
                                                                },
                                                                    [e._v("\n                        " + e._s(t.name) + ":\n                    ")]), n("span", {
                                                                        staticClass: "value"
                                                                    },
                                                                        [e._v("\n                        " + e._s(t.value) + "\n                    ")])])
                                                        })), 0)], 1)])])
        };
        a._withStripped = !0;
        var r = n(2),
            i = n.n(r),
            s = n(3),
            o = n.n(s),
            u = n(79),
            l = n(55),
            c = n(53),
            p = n(68),
            d = n.n(p),
            f = n(65),
            h = n.n(f),
            v = n(61),
            m = n.n(v),
            y = n(62),
            g = n.n(y),
            I = n(66),
            w = n.n(I);
        function x(e) {
            var t = 0;
            function n(n) {
                var a = e.charCodeAt(t);
                return n && a > 127 && (a -= 256),
                    t += 1,
                    a
            }
            return {
                eof: function () {
                    return t >= e.length
                },
                read: function (n) {
                    var a = e.substr(t, n);
                    return t += n,
                        a
                },
                readInt32: function () {
                    var n = (e.charCodeAt(t) << 24) + (e.charCodeAt(t + 1) << 16) + (e.charCodeAt(t + 2) << 8) + e.charCodeAt(t + 3);
                    return t += 4,
                        n
                },
                readInt16: function () {
                    var n = (e.charCodeAt(t) << 8) + e.charCodeAt(t + 1);
                    return t += 2,
                        n
                },
                readInt8: n,
                readVarInt: function () {
                    for (var e = 0; ;) {
                        var t = n();
                        if (!(128 & t)) return e + t;
                        e += 127 & t,
                            e <<= 7
                    }
                }
            }
        }
        function k(e) {
            function t(e) {
                var t = e.read(4),
                    n = e.readInt32();
                return {
                    id: t,
                    length: n,
                    data: e.read(n)
                }
            }
            var n;
            function a(e) {
                var t = {};
                t.deltaTime = e.readVarInt();
                var a = e.readInt8();
                if (240 == (240 & a)) {
                    var r;
                    if (255 != a) {
                        if (240 == a) return t.type = "sysEx",
                            r = e.readVarInt(),
                            t.data = e.read(r),
                            t;
                        if (247 == a) return t.type = "dividedSysEx",
                            r = e.readVarInt(),
                            t.data = e.read(r),
                            t;
                        throw "Unrecognised MIDI event type byte: ".concat(a)
                    }
                    t.type = "meta";
                    var i = e.readInt8();
                    switch (r = e.readVarInt(), i) {
                        case 0:
                            if (t.subtype = "sequenceNumber", 2 != r) throw "Expected length for sequenceNumber event is 2, got ".concat(r);
                            return t.number = e.readInt16(),
                                t;
                        case 1:
                            return t.subtype = "text",
                                t.text = e.read(r),
                                t;
                        case 2:
                            return t.subtype = "copyrightNotice",
                                t.text = e.read(r),
                                t;
                        case 3:
                            return t.subtype = "trackName",
                                t.text = e.read(r),
                                t;
                        case 4:
                            return t.subtype = "instrumentName",
                                t.text = e.read(r),
                                t;
                        case 5:
                            return t.subtype = "lyrics",
                                t.text = e.read(r),
                                t;
                        case 6:
                            return t.subtype = "marker",
                                t.text = e.read(r),
                                t;
                        case 7:
                            return t.subtype = "cuePoint",
                                t.text = e.read(r),
                                t;
                        case 32:
                            if (t.subtype = "midiChannelPrefix", 1 != r) throw "Expected length for midiChannelPrefix event is 1, got ".concat(r);
                            return t.channel = e.readInt8(),
                                t;
                        case 47:
                            if (t.subtype = "endOfTrack", 0 != r) throw "Expected length for endOfTrack event is 0, got ".concat(r);
                            return t;
                        case 81:
                            if (t.subtype = "setTempo", 3 != r) throw "Expected length for setTempo event is 3, got ".concat(r);
                            return t.microsecondsPerBeat = (e.readInt8() << 16) + (e.readInt8() << 8) + e.readInt8(),
                                t;
                        case 84:
                            if (t.subtype = "smpteOffset", 5 != r) throw "Expected length for smpteOffset event is 5, got ".concat(r);
                            var s = e.readInt8();
                            return t.frameRate = {
                                0: 24,
                                32: 25,
                                64: 29,
                                96: 30
                            }[96 & s],
                                t.hour = 31 & s,
                                t.min = e.readInt8(),
                                t.sec = e.readInt8(),
                                t.frame = e.readInt8(),
                                t.subframe = e.readInt8(),
                                t;
                        case 88:
                            if (t.subtype = "timeSignature", 4 != r) throw "Expected length for timeSignature event is 4, got ".concat(r);
                            return t.numerator = e.readInt8(),
                                t.denominator = Math.pow(2, e.readInt8()),
                                t.metronome = e.readInt8(),
                                t.thirtyseconds = e.readInt8(),
                                t;
                        case 89:
                            if (t.subtype = "keySignature", 2 != r) throw "Expected length for keySignature event is 2, got ".concat(r);
                            return t.key = e.readInt8(!0),
                                t.scale = e.readInt8(),
                                t;
                        case 127:
                            return t.subtype = "sequencerSpecific",
                                t.data = e.read(r),
                                t;
                        default:
                            return t.subtype = "unknown",
                                t.data = e.read(r),
                                t
                    }
                } else {
                    var o;
                    0 == (128 & a) ? (o = a, a = n) : (o = e.readInt8(), n = a);
                    var u = a >> 4;
                    switch (t.channel = 15 & a, t.type = "channel", u) {
                        case 8:
                            return t.subtype = "noteOff",
                                t.noteNumber = o,
                                t.velocity = e.readInt8(),
                                t;
                        case 9:
                            return t.noteNumber = o,
                                t.velocity = e.readInt8(),
                                0 == t.velocity ? t.subtype = "noteOff" : t.subtype = "noteOn",
                                t;
                        case 10:
                            return t.subtype = "noteAftertouch",
                                t.noteNumber = o,
                                t.amount = e.readInt8(),
                                t;
                        case 11:
                            return t.subtype = "controller",
                                t.controllerType = o,
                                t.value = e.readInt8(),
                                t;
                        case 12:
                            return t.subtype = "programChange",
                                t.programNumber = o,
                                t;
                        case 13:
                            return t.subtype = "channelAftertouch",
                                t.amount = o,
                                t;
                        case 14:
                            return t.subtype = "pitchBend",
                                t.value = o + (e.readInt8() << 7),
                                t;
                        default:
                            throw "Unrecognised MIDI event type: ".concat(u)
                    }
                }
            }
            var r = x(e),
                i = t(r);
            if ("MThd" != i.id || 6 != i.length) throw "Bad .mid file - header not found";
            var s = x(i.data),
                o = s.readInt16(),
                u = s.readInt16(),
                l = s.readInt16();
            if (32768 & l) throw new Error("Expressing time division in SMTPE frames is not supported yet");
            for (var c = {
                formatType: o,
                trackCount: u,
                ticksPerBeat: l
            },
                p = [], d = 0; d < c.trackCount; d++) {
                p[d] = [];
                var f = t(r);
                if ("MTrk" != f.id) throw "Unexpected chunk - expected MTrk, got ".concat(f.id);
                for (var h = x(f.data); !h.eof();) {
                    var v = a(h);
                    p[d].push(v)
                }
            }
            return {
                header: c,
                tracks: p
            }
        }
        function b(e, t, n, a) {
            for (var r, i = [], s = a || 120, o = !!a, u = e.header.ticksPerBeat, l = 0; l < e.tracks.length; l++) i[l] = {
                nextEventIndex: 0,
                ticksToNextEvent: e.tracks[l].length ? e.tracks[l][0].deltaTime : null
            };
            function c() {
                for (var t = null,
                    n = null,
                    a = null,
                    r = 0; r < i.length; r++) null != i[r].ticksToNextEvent && (null == t || i[r].ticksToNextEvent < t) && (t = i[r].ticksToNextEvent, n = r, a = i[r].nextEventIndex);
                if (null != n) {
                    var s = e.tracks[n][a];
                    e.tracks[n][a + 1] ? i[n].ticksToNextEvent += e.tracks[n][a + 1].deltaTime : i[n].ticksToNextEvent = null,
                        i[n].nextEventIndex += 1;
                    for (var o = 0; o < i.length; o++) null != i[o].ticksToNextEvent && (i[o].ticksToNextEvent -= t);
                    return {
                        ticksToEvent: t,
                        event: s,
                        track: n
                    }
                }
                return null
            }
            var p = [];
            return function () {
                function e() {
                    o || "meta" != r.event.type || "setTempo" != r.event.subtype || (s = 6e7 / r.event.microsecondsPerBeat);
                    var e = 0;
                    r.ticksToEvent > 0 && (e = r.ticksToEvent / u / (s / 60));
                    var n = 1e3 * e * t || 0;
                    p.push([r, n]),
                        r = c()
                }
                if (r = c()) for (; r;) e()
            }(),
            {
                getData: function () {
                    return function e(t) {
                        if ("object" !== w()(t)) return t;
                        if (null == t) return t;
                        var n = "number" == typeof t.length ? [] : {};
                        for (var a in t) n[a] = e(t[a]);
                        return n
                    }(p)
                }
            }
        }
        var T = new (function () {
            function e(t) {
                m()(this, e),
                    this.midifile = null,
                    this.replayer = null,
                    this.data = [],
                    this.eventQueue = [],
                    this.startTime = 0,
                    this.queueScheduleIndex = 0,
                    this.playInfo = {
                        playing: !1,
                        queueTime: 0,
                        nowTime: 0,
                        metaInfo: []
                    },
                    this.scheduleMessages = [],
                    this.keypress = t
            }
            return g()(e, [{
                key: "loadMidiFile",
                value: function (e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [];
                    this.playInfo.playing && this.stop(),
                        this.midifile = k(e),
                        this.replayer = b(this.midifile, 1, 0, null),
                        this.data = this.replayer.getData(),
                        this.playInfo.metaInfo = h()(t),
                        this.playInfo.nowTime = 0,
                        this.playInfo.queueTime = 0,
                        this.scheduleMessages = [],
                        this.queueScheduleIndex = 0,
                        this.parseMidiData()
                }
            },
            {
                key: "parseMidiData",
                value: function () {
                    for (var e = [], t = 5, n = 0; n < this.data.length; n++) {
                        var a = d()(this.data[n], 2),
                            r = a[0].event;
                        if (t += a[1], "channel" === r.type) {
                            var i = r.subtype;
                            if ("controller" === i);
                            else if ("pitchBend " === i);
                            else if ("noteOn" === i) {
                                var s = r.noteNumber;
                                e.push({
                                    event: r,
                                    time: Math.round(t),
                                    type: "noteOn",
                                    velocity: r.velocity,
                                    note: s
                                })
                            } else if ("noteOff" === i) {
                                var o = r.noteNumber;
                                e.push({
                                    event: r,
                                    time: Math.round(t),
                                    type: "noteOff",
                                    velocity: 0,
                                    note: o
                                })
                            }
                        } else if ("meta" === r.type) {
                            var u = r.subtype,
                                l = null;
                            "setTempo" === u || "smpteOffset" === u || "endOfTrack" === u || ("unknown" === u ? r.data && (l = {
                                name: "未知",
                                value: r.data
                            }) : "trackName" === u ? l = {
                                name: "曲目或音轨名称",
                                value: r.text
                            } : "copyrightNotice" === u ? l = {
                                name: "版权提示",
                                value: r.text
                            } : "text" === u ? l = {
                                name: "其他信息",
                                value: r.text
                            } : "timeSignature" === u && (l = {
                                name: "节拍信息",
                                value: "".concat(r.numerator, " / ").concat(r.denominator, ", ~ ").concat(r.metronome)
                            })),
                                l && this.playInfo.metaInfo.push(l)
                        }
                    }
                    this.eventQueue = e,
                        this.playInfo.queueTime = Math.ceil(t)
                }
            },
            {
                key: "_schedule",
                value: function () {
                    for (var e = this,
                        t = Date.now() - this.startTime, n = 0, a = function (a) {
                            var r = a.time - t;
                            if (!(r < 0)) {
                                var i = {
                                    t: setTimeout((function () {
                                        "noteOn" === a.type ? e._doNoteOn(a.note, a.velocity) : "noteOff" === a.type && e._doNoteOff(a.note),
                                            e.playInfo.nowTime = a.time;
                                        var t = e.scheduleMessages.indexOf(i);
                                        t >= 0 && e.scheduleMessages.splice(t, 1),
                                            e.scheduleMessages.length <= 20 && e._schedule(),
                                            e.scheduleMessages.length <= 0 && e._doEnd()
                                    }), r),
                                    obj: a
                                };
                                e.scheduleMessages.push(i),
                                    n++
                            }
                        }; this.queueScheduleIndex < this.eventQueue.length && n < 100; this.queueScheduleIndex++) {
                        a(this.eventQueue[this.queueScheduleIndex])
                    }
                }
            },
            {
                key: "_doNoteOn",
                value: function (e, t) {
                    this.keypress && this.keypress.down([e - 20], !1, 4)
                }
            },
            {
                key: "_doNoteOff",
                value: function (e) {
                    this.keypress && this.keypress.up([e - 20], 4)
                }
            },
            {
                key: "_doEnd",
                value: function () {
                    this.stop()
                }
            },
            {
                key: "start",
                value: function () {
                    if (!this.playInfo.playing) {
                        if (this.eventQueue.length <= 0) throw new Error("还未准备好曲子哦~");
                        this.playInfo.playing = !0,
                            this.playInfo.nowTime > 0 ? this.startTime = Date.now() - this.playInfo.nowTime : (this.startTime = Date.now(), this.queueScheduleIndex = 0),
                            this._schedule()
                    }
                }
            },
            {
                key: "pause",
                value: function () {
                    this.playInfo.playing = !1;
                    for (var e = 0; e < this.scheduleMessages.length; e++) {
                        var t = this.scheduleMessages[e];
                        clearTimeout(t.t),
                            this.queueScheduleIndex > 0 && (this.queueScheduleIndex -= 1)
                    }
                    this.scheduleMessages = [],
                        this.keypress && this.keypress.upAll(4)
                }
            },
            {
                key: "stop",
                value: function () {
                    this.playInfo.playing = !1;
                    for (var e = 0; e < this.scheduleMessages.length; e++) {
                        var t = this.scheduleMessages[e];
                        clearTimeout(t.t)
                    }
                    this.scheduleMessages = [],
                        this.queueScheduleIndex = 0,
                        this.playInfo.nowTime = 0,
                        this.keypress && this.keypress.upAll(4)
                }
            }]),
                e
        }())(n(64).a),
            _ = {
                components: {
                    xwButtonGroup: u.a,
                    xwButton: l.a
                },
                data: function () {
                    return {
                        playInfo: {
                            playing: !1,
                            queueTime: 0,
                            nowTime: 0,
                            metaInfo: []
                        }
                    }
                },
                mounted: function () {
                    var e = this,
                        t = document.createElement("input");
                    this.fileInput = t,
                        t.type = "file",
                        t.accept = "audio/midi,.mid,.midi,audio/x-midi",
                        t.onchange = function () {
                            var n = t.files[0];
                            e.parseFile(n)
                        },
                        this.playInfo = T.playInfo
                },
                methods: {
                    fileDrop: function (e) {
                        if (e.dataTransfer.files.length) {
                            var t = e.dataTransfer.files[0];
                            t.type.match(/audio*/) ? this.parseFile(t) : c.a.error(""),
                                window._paq && window._paq.push(["", "".concat(t.name)])
                        }
                    },
                    selectFile: function () {
                        this.fileInput.click()
                    },
                    readAsDataURL: function (e) {
                        return new Promise((function (t, n) {
                            var a = new FileReader;
                            a.onload = function () {
                                t(a.result)
                            },
                                a.onerror = n,
                                a.readAsDataURL(e),
                                window._paq && window._paq.push(["trackEvent", "piano", "选择MIDI文件", ""])
                        }))
                    },
                    parseFile: function (e) {
                        var t = this;
                        return o()(i.a.mark((function n() {
                            var a, r;
                            return i.a.wrap((function (n) {
                                for (; ;) switch (n.prev = n.next) {
                                    case 0:
                                        return n.prev = 0,
                                            window._paq && window._paq.push(["trackEvent", "piano", "解析MIDI", "".concat(e.name)]),
                                            n.next = 4,
                                            t.readAsDataURL(e);
                                    case 4:
                                        a = n.sent,
                                            r = a.split(",")[1],
                                            T.loadMidiFile(atob(r), [{
                                                name: "文件名",
                                                value: e.name
                                            },
                                            {
                                                name: "文件大小",
                                                value: e.size
                                            }]),
                                            n.next = 12;
                                        break;
                                    case 9:
                                        n.prev = 9,
                                            n.t0 = n.
                                                catch(0),
                                            c.a.error(n.t0.message || "识别文件的时候出错啦");
                                    case 12:
                                    case "end":
                                        return n.stop()
                                }
                            }), n, null, [[0, 9]])
                        })))()
                    },
                    play: function () {
                        
                        try {
                            T.start(),
                                window._paq && window._paq.push(["trackEvent", "piano", "播放MIDI", "".concat(this.playInfo.queueTime)])
                        } catch (e) {
                            c.a.error(e.message)
                        }
                    },
                    pause: function () {
                        T.pause()
                    },
                    stop: function () {
                        T.stop()
                    }
                }
            },
            E = (n(418), n(52)),
            M = Object(E.a)(_, a, [], !1, null, null, null);
        M.options.__file = "src/client/pages/piano/new/comp/panels/midi-file.vue";
        t.
            default = M.exports
    },
     
}]);