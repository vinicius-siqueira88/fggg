"use strict";(globalThis.webpackChunkweb_stories_wp=globalThis.webpackChunkweb_stories_wp||[]).push([[4991],{14848:(t,r,o)=>{o.d(r,{DATA_VERSION:()=>n.DATA_VERSION,migrate:()=>n.migrate});var n=o(7739)},19112:(t,r,o)=>{o.d(r,{default:()=>i});const n={randomUUID:"undefined"!=typeof crypto&&crypto.randomUUID&&crypto.randomUUID.bind(crypto)};let e;const u=new Uint8Array(16);function s(){if(!e&&(e="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto),!e))throw new Error("crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported");return e(u)}const a=[];for(let t=0;t<256;++t)a.push((t+256).toString(16).slice(1));function d(t,r=0){return a[t[r+0]]+a[t[r+1]]+a[t[r+2]]+a[t[r+3]]+"-"+a[t[r+4]]+a[t[r+5]]+"-"+a[t[r+6]]+a[t[r+7]]+"-"+a[t[r+8]]+a[t[r+9]]+"-"+a[t[r+10]]+a[t[r+11]]+a[t[r+12]]+a[t[r+13]]+a[t[r+14]]+a[t[r+15]]}const i=function(t,r,o){if(n.randomUUID&&!r&&!t)return n.randomUUID();const e=(t=t||{}).random||(t.rng||s)();if(e[6]=15&e[6]|64,e[8]=63&e[8]|128,r){o=o||0;for(let t=0;t<16;++t)r[o+t]=e[t];return r}return d(e)}}}]);