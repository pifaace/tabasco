!function (e) {
	function t(r) {
		if (n[r])
			return n[r].exports;
		var a = n[r] = {
			exports: {},
			id: r,
			loaded: !1
		};
		return e[r].call(a.exports, a, a.exports, t),
		a.loaded = !0,
		a.exports
	}
	var n = {};
	return t.m = e,
	t.c = n,
	t.p = "",
	t(0)
}
([function (e, t) {
			function n(e, t, n) {
				return new Promise(function (r) {
					d(t).then(function () {
						p[e] = {
							template: i(t)(n.trim()),
							type: t
						},
						r(p[e])
					})
				})
			}
			function r(e, t, n) {
				switch (t) {
				case j:
					return e(n);
				case b:
					return e(n);
				case v:
					return Mustache.render(e, n);
				case w:
					return e.render(n);
				default:
					return e
				}
			}
			function a(e, t) {
				var r = document.querySelector(e),
				a = r.getAttribute("type"),
				s = r.innerHTML;
				if (!t) {
					if (!a)
						throw new Error("Must provide `type` attribute for <script> templates (e.g., handlebars, jade, nunjucks, html)");
					if (-1 !== a.indexOf("handlebars"))
						t = j;
					else if (-1 !== a.indexOf("jade"))
						t = b;
					else if (-1 !== a.indexOf("mustache"))
						t = v;
					else if (-1 !== a.indexOf("nunjucks"))
						t = w;
					else {
						if (-1 === a.indexOf("html"))
							return void m("Template type could not be inferred from the script tag. Please add a type.");
						t = y
					}
				}
				return new Promise(function (r) {
					n(e, t, s).then(function (e) {
						r(e, t)
					})
				})
			}
			function s(e, t) {
				return new Promise(function (r) {
					var a;
					a = new XMLHttpRequest,
					a.addEventListener("load", function () {
						n(e, t, a.response).then(function (e) {
							r(e, t)
						})
					}),
					a.open("GET", e),
					a.send()
				})
			}
			function i(e) {
				switch (e) {
				case j:
					return u;
				case b:
					return c;
				case v:
					return u;
				case w:
					return o;
				default:
					return function (e) {
						return e
					}
				}
			}
			function u(e) {
				return Handlebars.compile(e)
			}
			function c(e) {
				return jade.compile(e)
			}
			function o(e) {
				return nunjucks.compile(e)
			}
			function d(e) {
				return new Promise(function (t) {
					if (!e || "html" === e)
						return t();
					var n = x[e];
					if (x[e] === !0)
						return t();
					n || (n = document.createElement("script"), x[e] = n, n.setAttribute("src", g[e]), h('Lazy-loading %s engine. Please add <script src="%s"> to your page.', e, g[e]), document.body.appendChild(n));
					var r = n.onload || function () {};
					n.onload = function () {
						r(),
						x[e] = !0,
						t()
					}
				})
			}
			var l = AFRAME.utils.debug,
			f = AFRAME.utils.extend,
			p = {},
			m = l("template-component:error"),
			h = l("template-component:info"),
			j = "handlebars",
			b = "jade",
			v = "mustache",
			w = "nunjucks",
			y = "html",
			x = {};
			x[j] = !!window.Handlebars,
			x[b] = !!window.jade,
			x[v] = !!window.Mustache,
			x[w] = !!window.nunjucks;
			var g = {};
			g[j] = "https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js",
			g[b] = "https://cdnjs.cloudflare.com/ajax/libs/jade/1.11.0/jade.min.js",
			g[v] = "https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.min.js",
			g[w] = "https://cdnjs.cloudflare.com/ajax/libs/nunjucks/2.3.0/nunjucks.min.js",
			AFRAME.registerComponent("template", {
				schema: {
					insert: {
						"default": "beforeend"
					},
					type: {
						"default": ""
					},
					src: {
						"default": ""
					},
					data: {
						"default": ""
					}
				},
				update: function (e) {
					var t = this.data,
					n = this.el,
					r = "#" === t.src[0] ? a : s,
					i = p[t.src];
					if (e && e.src !== t.src)
						for (; n.firstChild; )
							n.removeChild(n.firstChild);
					return i ? void this.renderTemplate(i) : void r(t.src, t.type).then(this.renderTemplate.bind(this))
				},
				renderTemplate: function (e) {
					var t = this.el,
					n = this.data,
					a = {};
					Object.keys(t.dataset).forEach(function (e) {
						a[e] = t.dataset[e]
					}),
					n.data && (a = f(a, t.getComputedAttribute(n.data)));
					var s = r(e.template, e.type, a);
					t.insertAdjacentHTML(n.insert, s)
				}
			}),
			AFRAME.registerComponent("template-set", {
				schema: {
					on: {
						type: "string"
					},
					src: {
						type: "string"
					},
					data: {
						type: "string"
					}
				},
				init: function () {
					var e = this.data,
					t = this.el;
					t.addEventListener(e.on, function () {
						t.setAttribute("template", {
							src: e.src,
							data: e.data
						})
					})
				}
			})
		}
	]);