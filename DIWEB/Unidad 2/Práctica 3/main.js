/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-batteryapi-emoji-geolocation-setclasses !*/
!(function (e, t, n) {
  function r(e) {
    var t = S.className,
      n = Modernizr._config.classPrefix || "";
    if ((_ && (t = t.baseVal), Modernizr._config.enableJSClass)) {
      var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
      t = t.replace(r, "$1" + n + "js$2");
    }
    Modernizr._config.enableClasses &&
      ((t += " " + n + e.join(" " + n)),
      _ ? (S.className.baseVal = t) : (S.className = t));
  }
  function o(e, t) {
    return typeof e === t;
  }
  function i() {
    var e, t, n, r, i, a, s;
    for (var l in C)
      if (C.hasOwnProperty(l)) {
        if (
          ((e = []),
          (t = C[l]),
          t.name &&
            (e.push(t.name.toLowerCase()),
            t.options && t.options.aliases && t.options.aliases.length))
        )
          for (n = 0; n < t.options.aliases.length; n++)
            e.push(t.options.aliases[n].toLowerCase());
        for (r = o(t.fn, "function") ? t.fn() : t.fn, i = 0; i < e.length; i++)
          (a = e[i]),
            (s = a.split(".")),
            1 === s.length
              ? (Modernizr[s[0]] = r)
              : (!Modernizr[s[0]] ||
                  Modernizr[s[0]] instanceof Boolean ||
                  (Modernizr[s[0]] = new Boolean(Modernizr[s[0]])),
                (Modernizr[s[0]][s[1]] = r)),
            h.push((r ? "" : "no-") + s.join("-"));
      }
  }
  function a() {
    return "function" != typeof t.createElement
      ? t.createElement(arguments[0])
      : _
      ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0])
      : t.createElement.apply(t, arguments);
  }
  function s(e) {
    return e
      .replace(/([a-z])-([a-z])/g, function (e, t, n) {
        return t + n.toUpperCase();
      })
      .replace(/^-/, "");
  }
  function l(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  }
  function f(e, t, n) {
    var r;
    for (var i in e)
      if (e[i] in t)
        return n === !1
          ? e[i]
          : ((r = t[e[i]]), o(r, "function") ? l(r, n || t) : r);
    return !1;
  }
  function u(e, t) {
    return !!~("" + e).indexOf(t);
  }
  function c(e) {
    return e
      .replace(/([A-Z])/g, function (e, t) {
        return "-" + t.toLowerCase();
      })
      .replace(/^ms-/, "-ms-");
  }
  function d(t, n, r) {
    var o;
    if ("getComputedStyle" in e) {
      o = getComputedStyle.call(e, t, n);
      var i = e.console;
      if (null !== o) r && (o = o.getPropertyValue(r));
      else if (i) {
        var a = i.error ? "error" : "log";
        i[a].call(
          i,
          "getComputedStyle returning null, its possible modernizr test results are inaccurate"
        );
      }
    } else o = !n && t.currentStyle && t.currentStyle[r];
    return o;
  }
  function p() {
    var e = t.body;
    return e || ((e = a(_ ? "svg" : "body")), (e.fake = !0)), e;
  }
  function v(e, n, r, o) {
    var i,
      s,
      l,
      f,
      u = "modernizr",
      c = a("div"),
      d = p();
    if (parseInt(r, 10))
      for (; r--; )
        (l = a("div")), (l.id = o ? o[r] : u + (r + 1)), c.appendChild(l);
    return (
      (i = a("style")),
      (i.type = "text/css"),
      (i.id = "s" + u),
      (d.fake ? d : c).appendChild(i),
      d.appendChild(c),
      i.styleSheet
        ? (i.styleSheet.cssText = e)
        : i.appendChild(t.createTextNode(e)),
      (c.id = u),
      d.fake &&
        ((d.style.background = ""),
        (d.style.overflow = "hidden"),
        (f = S.style.overflow),
        (S.style.overflow = "hidden"),
        S.appendChild(d)),
      (s = n(c, e)),
      d.fake
        ? (d.parentNode.removeChild(d), (S.style.overflow = f), S.offsetHeight)
        : c.parentNode.removeChild(c),
      !!s
    );
  }
  function m(t, r) {
    var o = t.length;
    if ("CSS" in e && "supports" in e.CSS) {
      for (; o--; ) if (e.CSS.supports(c(t[o]), r)) return !0;
      return !1;
    }
    if ("CSSSupportsRule" in e) {
      for (var i = []; o--; ) i.push("(" + c(t[o]) + ":" + r + ")");
      return (
        (i = i.join(" or ")),
        v(
          "@supports (" + i + ") { #modernizr { position: absolute; } }",
          function (e) {
            return "absolute" == d(e, null, "position");
          }
        )
      );
    }
    return n;
  }
  function g(e, t, r, i) {
    function l() {
      c && (delete z.style, delete z.modElem);
    }
    if (((i = o(i, "undefined") ? !1 : i), !o(r, "undefined"))) {
      var f = m(e, r);
      if (!o(f, "undefined")) return f;
    }
    for (
      var c, d, p, v, g, y = ["modernizr", "tspan", "samp"];
      !z.style && y.length;

    )
      (c = !0), (z.modElem = a(y.shift())), (z.style = z.modElem.style);
    for (p = e.length, d = 0; p > d; d++)
      if (
        ((v = e[d]),
        (g = z.style[v]),
        u(v, "-") && (v = s(v)),
        z.style[v] !== n)
      ) {
        if (i || o(r, "undefined")) return l(), "pfx" == t ? v : !0;
        try {
          z.style[v] = r;
        } catch (h) {}
        if (z.style[v] != g) return l(), "pfx" == t ? v : !0;
      }
    return l(), !1;
  }
  function y(e, t, n, r, i) {
    var a = e.charAt(0).toUpperCase() + e.slice(1),
      s = (e + " " + b.join(a + " ") + a).split(" ");
    return o(t, "string") || o(t, "undefined")
      ? g(s, t, r, i)
      : ((s = (e + " " + E.join(a + " ") + a).split(" ")), f(s, t, n));
  }
  var h = [],
    C = [],
    x = {
      _version: "3.6.0",
      _config: {
        classPrefix: "",
        enableClasses: !0,
        enableJSClass: !0,
        usePrefixes: !0,
      },
      _q: [],
      on: function (e, t) {
        var n = this;
        setTimeout(function () {
          t(n[e]);
        }, 0);
      },
      addTest: function (e, t, n) {
        C.push({ name: e, fn: t, options: n });
      },
      addAsyncTest: function (e) {
        C.push({ name: null, fn: e });
      },
    },
    Modernizr = function () {};
  (Modernizr.prototype = x),
    (Modernizr = new Modernizr()),
    Modernizr.addTest("geolocation", "geolocation" in navigator);
  var S = t.documentElement,
    _ = "svg" === S.nodeName.toLowerCase();
  Modernizr.addTest("canvas", function () {
    var e = a("canvas");
    return !(!e.getContext || !e.getContext("2d"));
  }),
    Modernizr.addTest("canvastext", function () {
      return Modernizr.canvas === !1
        ? !1
        : "function" == typeof a("canvas").getContext("2d").fillText;
    }),
    Modernizr.addTest("emoji", function () {
      if (!Modernizr.canvastext) return !1;
      var t = e.devicePixelRatio || 1,
        n = 12 * t,
        r = a("canvas"),
        o = r.getContext("2d");
      return (
        (o.fillStyle = "#f00"),
        (o.textBaseline = "top"),
        (o.font = "32px Arial"),
        o.fillText("🐨", 0, 0),
        0 !== o.getImageData(n, n, 1, 1).data[0]
      );
    });
  var w = "Moz O ms Webkit",
    b = x._config.usePrefixes ? w.split(" ") : [];
  x._cssomPrefixes = b;
  var T = function (t) {
    var r,
      o = prefixes.length,
      i = e.CSSRule;
    if ("undefined" == typeof i) return n;
    if (!t) return !1;
    if (
      ((t = t.replace(/^@/, "")),
      (r = t.replace(/-/g, "_").toUpperCase() + "_RULE"),
      r in i)
    )
      return "@" + t;
    for (var a = 0; o > a; a++) {
      var s = prefixes[a],
        l = s.toUpperCase() + "_" + r;
      if (l in i) return "@-" + s.toLowerCase() + "-" + t;
    }
    return !1;
  };
  x.atRule = T;
  var E = x._config.usePrefixes ? w.toLowerCase().split(" ") : [];
  x._domPrefixes = E;
  var P = { elem: a("modernizr") };
  Modernizr._q.push(function () {
    delete P.elem;
  });
  var z = { style: P.elem.style };
  Modernizr._q.unshift(function () {
    delete z.style;
  }),
    (x.testAllProps = y);
  var N = (x.prefixed = function (e, t, n) {
    return 0 === e.indexOf("@")
      ? T(e)
      : (-1 != e.indexOf("-") && (e = s(e)), t ? y(e, t, n) : y(e, "pfx"));
  });
  Modernizr.addTest("batteryapi", !!N("battery", navigator), {
    aliases: ["battery-api"],
  }),
    i(),
    r(h),
    delete x.addTest,
    delete x.addAsyncTest;
  for (var j = 0; j < Modernizr._q.length; j++) Modernizr._q[j]();
  e.Modernizr = Modernizr;
})(window, document);
