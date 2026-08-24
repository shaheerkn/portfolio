/* ============================================================
   1. AUDIO ENGINE — every shot is synthesized, zero asset files
   ============================================================ */
let AC=null, master=null, revSend=null, noiseBuf=null, curve=null, armed=false;
let volume=0.8, muted=false;

function makeCurve(k){const n=1024,c=new Float32Array(n);for(let i=0;i<n;i++){const x=i*2/n-1;c[i]=(1+k)*x/(1+k*Math.abs(x));}return c;}
function makeIR(C,dur,decay){const len=C.sampleRate*dur,b=C.createBuffer(2,len,C.sampleRate);
  for(let ch=0;ch<2;ch++){const d=b.getChannelData(ch);for(let i=0;i<len;i++)d[i]=(Math.random()*2-1)*Math.pow(1-i/len,decay);}return b;}

function audio(){
  if(AC) { if(AC.state==='suspended') AC.resume(); return AC; }
  AC=new (window.AudioContext||window.webkitAudioContext)();
  const C=AC;
  noiseBuf=C.createBuffer(1,C.sampleRate*2,C.sampleRate);
  const d=noiseBuf.getChannelData(0);
  for(let i=0;i<d.length;i++) d[i]=Math.random()*2-1;
  curve=makeCurve(14);
  const comp=C.createDynamicsCompressor();
  comp.threshold.value=-16; comp.knee.value=12; comp.ratio.value=10;
  comp.attack.value=0.002; comp.release.value=0.22;
  comp.connect(C.destination);
  master=C.createGain(); master.gain.value=volume; master.connect(comp);
  const conv=C.createConvolver(); conv.buffer=makeIR(C,2.2,3.2);
  revSend=C.createGain(); revSend.gain.value=0.28;
  revSend.connect(conv); conv.connect(comp);
  return C;
}
function out(node,wet){ node.connect(master); if(wet){const g=AC.createGain();g.gain.value=wet;node.connect(g);g.connect(revSend);} }

/* --- one gunshot: low thump + shaped noise blast + high crack + tail --- */
function blast(s,semi,at){
  const C=audio(), t=C.currentTime+(at||0), k=Math.pow(2,(semi||0)/12);

  // low-end body (the "thump" you feel)
  const o=C.createOscillator(); o.type='sine';
  o.frequency.setValueAtTime(s.f0*k,t);
  o.frequency.exponentialRampToValueAtTime(s.f1*k,t+s.bd);
  const og=C.createGain();
  og.gain.setValueAtTime(0,t); og.gain.linearRampToValueAtTime(s.bg,t+0.004);
  og.gain.exponentialRampToValueAtTime(0.0008,t+s.bd);
  o.connect(og); out(og,s.wet*0.5); o.start(t); o.stop(t+s.bd+0.05);

  // main noise blast
  const n=C.createBufferSource(); n.buffer=noiseBuf; n.loop=true; n.playbackRate.value=k;
  const hp=C.createBiquadFilter(); hp.type='highpass'; hp.frequency.value=s.hp*k;
  const lp=C.createBiquadFilter(); lp.type='lowpass'; lp.Q.value=s.q||0.8;
  lp.frequency.setValueAtTime(s.lp0*k,t);
  lp.frequency.exponentialRampToValueAtTime(s.lp1*k,t+s.nd);
  const ws=C.createWaveShaper(); ws.curve=curve;
  const ng=C.createGain();
  ng.gain.setValueAtTime(0,t); ng.gain.linearRampToValueAtTime(s.ng,t+0.0015);
  ng.gain.exponentialRampToValueAtTime(0.0006,t+s.nd);
  n.connect(hp); hp.connect(lp); lp.connect(ws); ws.connect(ng);
  out(ng,s.wet); n.start(t,Math.random()); n.stop(t+s.nd+0.05);

  // supersonic crack (snap on top)
  if(s.cg){
    const c=C.createBufferSource(); c.buffer=noiseBuf; c.playbackRate.value=k*1.6;
    const cf=C.createBiquadFilter(); cf.type='bandpass'; cf.frequency.value=s.cf*k; cf.Q.value=1.4;
    const cg=C.createGain();
    cg.gain.setValueAtTime(s.cg,t); cg.gain.exponentialRampToValueAtTime(0.0005,t+0.05);
    c.connect(cf); cf.connect(cg); out(cg,s.wet*0.6);
    c.start(t,Math.random()); c.stop(t+0.09);
  }
  // rolling echo tail (distance / room)
  if(s.td){
    const r=C.createBufferSource(); r.buffer=noiseBuf; r.playbackRate.value=k*0.5;
    const rf=C.createBiquadFilter(); rf.type='lowpass'; rf.frequency.value=700*k;
    const rg=C.createGain();
    rg.gain.setValueAtTime(0,t+0.03); rg.gain.linearRampToValueAtTime(s.tg,t+0.09);
    rg.gain.exponentialRampToValueAtTime(0.0004,t+s.td);
    r.connect(rf); rf.connect(rg); out(rg,0.9);
    r.start(t,Math.random()); r.stop(t+s.td+0.05);
  }
}

/* --- energy weapon: pitch-swept osc + shimmer --- */
function zap(s,semi,at){
  const C=audio(), t=C.currentTime+(at||0), k=Math.pow(2,(semi||0)/12);
  [ {ty:'sawtooth',g:s.g}, {ty:'square',g:s.g*0.45} ].forEach((L,i)=>{
    const o=C.createOscillator(); o.type=L.ty;
    o.frequency.setValueAtTime(s.f0*k*(i?1.005:1),t);
    o.frequency.exponentialRampToValueAtTime(s.f1*k,t+s.d);
    const bp=C.createBiquadFilter(); bp.type='lowpass'; bp.Q.value=8;
    bp.frequency.setValueAtTime(s.f0*k*2.2,t);
    bp.frequency.exponentialRampToValueAtTime(s.f1*k*2.5,t+s.d);
    const g=C.createGain();
    g.gain.setValueAtTime(0,t); g.gain.linearRampToValueAtTime(L.g,t+0.003);
    g.gain.exponentialRampToValueAtTime(0.0006,t+s.d);
    o.connect(bp); bp.connect(g); out(g,0.5); o.start(t); o.stop(t+s.d+0.04);
  });
  const n=C.createBufferSource(); n.buffer=noiseBuf; n.playbackRate.value=1.8;
  const f=C.createBiquadFilter(); f.type='bandpass'; f.frequency.value=3200*k; f.Q.value=2;
  const g=C.createGain(); g.gain.setValueAtTime(s.g*0.5,t); g.gain.exponentialRampToValueAtTime(0.0005,t+0.07);
  n.connect(f); f.connect(g); out(g,0.6); n.start(t,Math.random()); n.stop(t+0.1);
}

/* --- ricochet whine --- */
function ric(semi,at){
  const C=audio(), t=C.currentTime+(at||0), k=Math.pow(2,(semi||0)/12);
  blast(FAM.smg.snd,semi+4,at);
  const o=C.createOscillator(); o.type='triangle';
  o.frequency.setValueAtTime(2600*k,t+0.03);
  o.frequency.exponentialRampToValueAtTime(520*k,t+0.42);
  const g=C.createGain();
  g.gain.setValueAtTime(0,t+0.03); g.gain.linearRampToValueAtTime(0.18,t+0.06);
  g.gain.exponentialRampToValueAtTime(0.0005,t+0.45);
  o.connect(g); out(g,0.8); o.start(t+0.03); o.stop(t+0.5);
}

/* --- mechanical dry-fire / reload click --- */
function click(semi,at,gain){
  const C=audio(), t=C.currentTime+(at||0), k=Math.pow(2,(semi||0)/12);
  const n=C.createBufferSource(); n.buffer=noiseBuf; n.playbackRate.value=k;
  const f=C.createBiquadFilter(); f.type='bandpass'; f.frequency.value=1800*k; f.Q.value=1.1;
  const g=C.createGain();
  g.gain.setValueAtTime(gain||0.22,t); g.gain.exponentialRampToValueAtTime(0.0004,t+0.045);
  n.connect(f); f.connect(g); out(g,0.25); n.start(t,Math.random()); n.stop(t+0.07);
  const o=C.createOscillator(); o.type='square'; o.frequency.setValueAtTime(180*k,t);
  o.frequency.exponentialRampToValueAtTime(70*k,t+0.05);
  const og=C.createGain(); og.gain.setValueAtTime(0.1,t); og.gain.exponentialRampToValueAtTime(0.0004,t+0.06);
  o.connect(og); out(og,0.15); o.start(t); o.stop(t+0.08);
}

/* --- bazooka / RPG: backblast + motor whoosh + delayed impact detonation --- */
function rocket(semi,at){
  const C=audio(), t=C.currentTime+(at||0), k=Math.pow(2,(semi||0)/12), FLY=0.62;

  // launch: backblast thump out of the tube
  blast({f0:135,f1:28,bd:.3,bg:1.0,hp:90,lp0:4600,lp1:240,nd:.4,ng:.62,
         cf:1900,cg:.14,td:.7,tg:.13,wet:.7,q:.7}, semi, at);

  // rocket motor: noise through a falling bandpass + tremolo = receding whoosh
  const n=C.createBufferSource(); n.buffer=noiseBuf; n.loop=true; n.playbackRate.value=k;
  const bp=C.createBiquadFilter(); bp.type='bandpass'; bp.Q.value=1.5;
  bp.frequency.setValueAtTime(1500*k,t+0.02);
  bp.frequency.exponentialRampToValueAtTime(380*k,t+FLY);
  const lp=C.createBiquadFilter(); lp.type='lowpass';
  lp.frequency.setValueAtTime(6000*k,t+0.02);
  lp.frequency.exponentialRampToValueAtTime(900*k,t+FLY);
  const trem=C.createGain(); trem.gain.value=1;
  const lfo=C.createOscillator(); lfo.type='sine'; lfo.frequency.value=34;
  const lfoG=C.createGain(); lfoG.gain.value=0.35;
  lfo.connect(lfoG); lfoG.connect(trem.gain); lfo.start(t); lfo.stop(t+FLY+0.1);
  const g=C.createGain();
  g.gain.setValueAtTime(0.0001,t+0.02);
  g.gain.linearRampToValueAtTime(.34,t+0.11);
  g.gain.linearRampToValueAtTime(.15,t+0.42);
  g.gain.exponentialRampToValueAtTime(.004,t+FLY);
  n.connect(bp); bp.connect(lp); lp.connect(trem); trem.connect(g);
  out(g,.6); n.start(t+0.02,Math.random()); n.stop(t+FLY+0.05);

  // impact: the real detonation, bigger than a grenade
  const A=(at||0)+FLY;
  blast({f0:85,f1:15,bd:.75,bg:1.5,hp:35,lp0:4200,lp1:95,nd:1.15,ng:.95,
         cf:2600,cg:.3,td:2.6,tg:.4,wet:1,q:.6}, semi-3, A);
  // secondary shockwave slap + scattering debris
  blast({f0:60,f1:12,bd:1.0,bg:.7,hp:28,lp0:1400,lp1:60,nd:1.7,ng:.4,
         cf:0,cg:0,td:2.9,tg:.26,wet:1,q:.5}, semi-5, A+0.07);
  for(let i=0;i<14;i++) click(6+Math.random()*12, A+0.12+Math.random()*0.55, 0.05+Math.random()*0.06);
}

/* ============================================================
   2. WEAPON FAMILIES
   ============================================================ */
const FAM={
  rifle:{name:'ASSAULT RIFLE',c:'#ff8a3d',kick:9,rate:75,flash:1,spread:34,shells:2,
    snd:{f0:170,f1:44,bd:.16,bg:.75,hp:220,lp0:8000,lp1:900,nd:.19,ng:.55,cf:4200,cg:.34,td:.5,tg:.1,wet:.5,q:1}},
  pistol:{name:'PISTOL',c:'#ffd166',kick:8,rate:110,flash:.9,spread:26,shells:1,
    snd:{f0:150,f1:40,bd:.14,bg:.8,hp:170,lp0:6200,lp1:640,nd:.22,ng:.5,cf:3000,cg:.24,td:.42,tg:.09,wet:.5,q:1}},
  smg:{name:'SMG',c:'#6ee7ff',kick:5,rate:55,flash:.7,spread:44,shells:1,
    snd:{f0:130,f1:48,bd:.09,bg:.55,hp:340,lp0:9000,lp1:1500,nd:.1,ng:.44,cf:5200,cg:.26,td:.26,tg:.05,wet:.4,q:1}},
  shotgun:{name:'SHOTGUN',c:'#ff4d5a',kick:20,rate:520,flash:1.7,spread:120,shells:4,
    snd:{f0:110,f1:26,bd:.34,bg:1.15,hp:80,lp0:5200,lp1:300,nd:.5,ng:.72,cf:2200,cg:.2,td:.95,tg:.2,wet:.75,q:.7}},
  sniper:{name:'SNIPER',c:'#7cff9b',kick:24,rate:900,flash:1.9,spread:8,shells:1,
    snd:{f0:190,f1:30,bd:.3,bg:1.1,hp:150,lp0:11000,lp1:420,nd:.42,ng:.72,cf:5600,cg:.5,td:1.5,tg:.24,wet:.9,q:1.4}},
  minigun:{name:'MINIGUN',c:'#ff9f1c',kick:7,rate:420,flash:.9,spread:60,shells:6,burst:6,gap:.055,
    snd:{f0:150,f1:44,bd:.1,bg:.55,hp:280,lp0:8600,lp1:1100,nd:.12,ng:.42,cf:4600,cg:.24,td:.3,tg:.06,wet:.45,q:1}},
  boom:{name:'EXPLOSION',c:'#ff3b1f',kick:34,rate:700,flash:2.6,spread:200,shells:0,
    snd:{f0:90,f1:18,bd:.65,bg:1.35,hp:40,lp0:3800,lp1:120,nd:.95,ng:.85,cf:0,cg:0,td:2.1,tg:.34,wet:1,q:.6}},
  laser:{name:'PLASMA',c:'#b18cff',kick:5,rate:90,flash:.9,spread:14,shells:0,energy:1,
    snd:{f0:1500,f1:150,d:.2,g:.3}},
  ricochet:{name:'RICOCHET',c:'#4dd4ff',kick:6,rate:150,flash:.7,spread:70,shells:1,rico:1,snd:{}},
  bazooka:{name:'BAZOOKA',c:'#ffe066',kick:16,rate:1400,flash:1.5,spread:22,shells:0,rocket:1,snd:{}},
  dry:{name:'DRY FIRE',c:'#8a94a6',kick:1,rate:120,flash:0,spread:0,shells:0,dryfire:1,snd:{}}
};

/* ============================================================
   3. KEY MAP — family + per-key pitch so no two keys match
   ============================================================ */
const ROWS=[
  {keys:'1234567890'.split(''), fam:'laser',  base:7,  step:-1.5},
  {keys:'QWERTYUIOP'.split(''),fam:'rifle',  base:-5, step:1.1},
  {keys:'ASDFGHJKL'.split(''), fam:'pistol', base:-4, step:1.1},
  {keys:'ZXCVBNM'.split(''),   fam:'smg',    base:-3, step:1.3}
];
const MAP={};
ROWS.forEach(r=>r.keys.forEach((k,i)=>MAP[k]={fam:r.fam,semi:r.base+i*r.step,label:k}));
Object.assign(MAP,{
  ' '        :{fam:'shotgun', semi:0,  label:'SPACE'},
  'ENTER'    :{fam:'boom',    semi:0,  label:'ENTER'},
  'TAB'      :{fam:'sniper',  semi:0,  label:'TAB'},
  'SHIFT'    :{fam:'minigun', semi:0,  label:'SHIFT'},
  'B'        :{fam:'bazooka', semi:0,  label:'B'},
  'BACKSPACE':{fam:'dry',     semi:0,  label:'⌫'},
  'ARROWLEFT':{fam:'ricochet',semi:-2, label:'←'},
  'ARROWDOWN':{fam:'ricochet',semi:0,  label:'↓'},
  'ARROWUP'  :{fam:'ricochet',semi:2,  label:'↑'},
  'ARROWRIGHT':{fam:'ricochet',semi:4, label:'→'},
  ',':{fam:'smg',semi:6,label:','}, '.':{fam:'smg',semi:7.5,label:'.'}, '/':{fam:'smg',semi:9,label:'/'},
  ';':{fam:'pistol',semi:6,label:';'}, "'":{fam:'pistol',semi:7.5,label:"'"},
  '-':{fam:'laser',semi:-10,label:'-'}, '=':{fam:'laser',semi:-12,label:'='}
});
function normKey(e){
  const k=e.key;
  if(k===' ')return' ';
  if(k.length===1)return k.toUpperCase();
  return k.toUpperCase();
}

/* ============================================================
   4. VISUALS — canvas range, holes, sparks, smoke, flash
   ============================================================ */
const cv=document.getElementById('range'), cx=cv.getContext('2d');
let W=0,H=0,DPR=1;
function resize(){DPR=Math.min(devicePixelRatio||1,2);W=cv.clientWidth;H=cv.clientHeight;
  cv.width=W*DPR;cv.height=H*DPR;cx.setTransform(DPR,0,0,DPR,0,0);}
addEventListener('resize',resize);

const holes=[],parts=[],rings=[];
let flash=0,flashC='#fff',shk=0,shkD=0;
const shakeEl=document.getElementById('shake');

function fireVisual(f){
  const cxp=W/2, cyp=H*0.46;
  const sp=f.spread;
  const n=f.shells||0;
  for(let i=0;i<Math.max(n,1);i++){
    const a=Math.random()*Math.PI*2, r=Math.pow(Math.random(),.6)*sp;
    const x=cxp+Math.cos(a)*r*1.5, y=cyp+Math.sin(a)*r;
    if(n>0) holes.push({x,y,t:1,s:3+Math.random()*3.5,c:f.c});
    // sparks
    for(let s=0;s<7;s++){
      const sa=Math.random()*Math.PI*2, sv=1.5+Math.random()*5;
      parts.push({x,y,vx:Math.cos(sa)*sv,vy:Math.sin(sa)*sv-.5,t:1,d:.032+Math.random()*.03,
        s:1+Math.random()*2,c:f.c,g:.14,type:'spark'});
    }
    // smoke
    for(let s=0;s<3;s++)
      parts.push({x,y,vx:(Math.random()-.5)*.7,vy:-.5-Math.random()*.9,t:1,d:.008,
        s:8+Math.random()*16,c:'#8a8f9a',g:-.005,type:'smoke'});
  }
  rings.push({x:cxp,y:cyp,r:8,t:1,c:f.c,mx:60+f.kick*7});
  flash=Math.min(1.15,f.flash); flashC=f.c;
  shk=Math.min(30,f.kick); shkD=Math.random()*Math.PI*2;
}

function rocketTrail(ms,c){
  const t0=performance.now(), y0=H*0.95, y1=H*0.46, x0=W/2;
  (function step(){
    const p=(performance.now()-t0)/ms;
    if(p>=1||p<0) return;
    const x=x0+Math.sin(p*11)*7, y=y0+(y1-y0)*p;
    parts.push({x,y,vx:(Math.random()-.5)*.4,vy:.35+Math.random()*.5,t:1,d:.011,
      s:6+Math.random()*11,c:'#9aa0ab',g:-.004,type:'smoke'});
    parts.push({x,y,vx:(Math.random()-.5)*1.3,vy:.4+Math.random()*1.4,t:1,d:.05,
      s:1.5+Math.random()*2.2,c:c,g:.05,type:'spark'});
    requestAnimationFrame(step);
  })();
}

function draw(){
  cx.clearRect(0,0,W,H);
  const cxp=W/2, cyp=H*0.46;

  // faint target rings
  cx.save(); cx.globalAlpha=.16; cx.strokeStyle='#2a3040'; cx.lineWidth=1;
  for(let i=1;i<=5;i++){cx.beginPath();cx.arc(cxp,cyp,i*46,0,7);cx.stroke();}
  cx.beginPath();cx.moveTo(cxp-260,cyp);cx.lineTo(cxp+260,cyp);
  cx.moveTo(cxp,cyp-200);cx.lineTo(cxp,cyp+200);cx.stroke(); cx.restore();

  // bullet holes
  for(let i=holes.length-1;i>=0;i--){const h=holes[i];h.t-=0.0022;
    if(h.t<=0){holes.splice(i,1);continue;}
    cx.globalAlpha=h.t*.85; cx.fillStyle='#05060a';
    cx.beginPath();cx.arc(h.x,h.y,h.s,0,7);cx.fill();
    cx.globalAlpha=h.t*.5; cx.strokeStyle=h.c; cx.lineWidth=1.4;
    cx.beginPath();cx.arc(h.x,h.y,h.s+2,0,7);cx.stroke();
  }
  if(holes.length>220) holes.splice(0,holes.length-220);

  // shock rings
  for(let i=rings.length-1;i>=0;i--){const r=rings[i];r.t-=0.045;r.r+=(r.mx-r.r)*0.18;
    if(r.t<=0){rings.splice(i,1);continue;}
    cx.globalAlpha=r.t*.55;cx.strokeStyle=r.c;cx.lineWidth=2*r.t+.4;
    cx.beginPath();cx.arc(r.x,r.y,r.r,0,7);cx.stroke();}

  // particles
  for(let i=parts.length-1;i>=0;i--){const p=parts[i];
    p.x+=p.vx;p.y+=p.vy;p.vy+=p.g;p.vx*=.965;p.vy*=.965;p.t-=p.d;
    if(p.t<=0){parts.splice(i,1);continue;}
    if(p.type==='smoke'){cx.globalAlpha=p.t*.13;cx.fillStyle=p.c;
      cx.beginPath();cx.arc(p.x,p.y,p.s*(2-p.t),0,7);cx.fill();}
    else{cx.globalAlpha=p.t;cx.fillStyle=p.c;cx.shadowBlur=10;cx.shadowColor=p.c;
      cx.fillRect(p.x,p.y,p.s,p.s);cx.shadowBlur=0;}
  }
  if(parts.length>900) parts.splice(0,parts.length-900);

  // muzzle flash wash
  if(flash>0.001){
    const g=cx.createRadialGradient(cxp,cyp,0,cxp,cyp,Math.max(W,H)*.62);
    g.addColorStop(0,flashC);g.addColorStop(.28,flashC);g.addColorStop(1,'transparent');
    cx.globalAlpha=flash*.32;cx.fillStyle=g;cx.fillRect(0,0,W,H);
    flash*=0.8;
  }

  // crosshair
  cx.globalAlpha=.75;cx.strokeStyle='#ff7a1a';cx.lineWidth=1.5;
  const gap=9+shk*0.8, len=15;
  [[0,-1],[0,1],[-1,0],[1,0]].forEach(([dx,dy])=>{
    cx.beginPath();cx.moveTo(cxp+dx*gap,cyp+dy*gap);
    cx.lineTo(cxp+dx*(gap+len),cyp+dy*(gap+len));cx.stroke();});
  cx.globalAlpha=1;cx.fillStyle='#ff7a1a';cx.fillRect(cxp-1,cyp-1,2,2);

  // recoil shake
  if(shk>0.05){shakeEl.style.transform=
    `translate(${Math.cos(shkD)*shk}px,${Math.sin(shkD)*shk*.7}px) rotate(${Math.cos(shkD)*shk*.06}deg)`;
    shk*=0.82; shkD+=2.4;}
  else shakeEl.style.transform='';

  requestAnimationFrame(draw);
}
resize(); draw();

/* ============================================================
   5. GAME LOOP — ammo, stats, firing
   ============================================================ */
const MAG=30; let ammo=MAG, reloading=false, shots=0, streak=0, best=0;
const times=[]; const lastFire={};
const el=id=>document.getElementById(id);

function setAmmo(){el('aN').textContent=ammo;el('aN').classList.toggle('low',ammo<=6);}
function reload(){
  if(reloading)return; reloading=true; el('ammo').classList.add('rl');
  el('aM').textContent='RELOADING…';
  click(-4,0,.3); click(2,.16,.26); click(-2,.34,.3);
  setTimeout(()=>{ammo=MAG;reloading=false;setAmmo();
    el('ammo').classList.remove('rl');el('aM').innerHTML='/ 30 &nbsp;·&nbsp; SHIFT+R RELOAD';},520);
}
function updRpm(){
  const now=performance.now(); times.push(now);
  while(times.length&&now-times[0]>3000) times.shift();
  el('sRpm').textContent=Math.round(times.length/3*60);
}
setInterval(()=>{ // decay rpm + streak when idle
  const now=performance.now();
  while(times.length&&now-times[0]>3000) times.shift();
  el('sRpm').textContent=Math.round(times.length/3*60);
  if(times.length===0&&streak){streak=0;el('sStreak').textContent=0;}
},400);

function fire(keyName){
  const m=MAP[keyName]; if(!m) return;
  const f=FAM[m.fam];
  const now=performance.now();
  if(now-(lastFire[keyName]||0)<f.rate) return;   // per-weapon fire rate
  lastFire[keyName]=now;

  if(el('hint').style.opacity!=='0'){el('hint').style.opacity='0';}
  flashKey(keyName,f.c);
  el('sWpn').textContent=f.name; el('sWpn').style.color=f.c;

  // dry fire / empty mag
  if(f.dryfire||(ammo<=0&&!f.energy)){
    click(6,0,.18); shk=Math.max(shk,2);
    if(!f.dryfire&&ammo<=0) reload();
    return;
  }

  if(f.rocket)      rocket(m.semi,0);
  else if(f.energy) zap(f.snd,m.semi,0);
  else if(f.rico)   ric(m.semi,0);
  else if(f.burst){ for(let i=0;i<f.burst;i++) blast(f.snd,m.semi+(Math.random()*1.4-.7),i*f.gap); }
  else              blast(f.snd,m.semi,0);

  if(f.rocket){
    fireVisual({c:f.c,kick:13,flash:1.3,spread:20,shells:0});        // backblast at the tube
    rocketTrail(620,f.c);                                            // rocket flies downrange
    setTimeout(()=>fireVisual({c:'#ff3b1f',kick:38,flash:2.9,spread:230,shells:9}),620); // impact
  } else fireVisual(f);
  if(!f.energy){ammo=Math.max(0,ammo-(f.burst||1));setAmmo();if(ammo===0)setTimeout(reload,260);}
  shots+=(f.burst||1); streak++; best=Math.max(best,streak);
  el('sShots').textContent=shots; el('sStreak').textContent=streak;
  updRpm();
}

/* ============================================================
   6. BUILD THE ON-SCREEN KEYBOARD
   ============================================================ */
const kb=el('kb'), keyEls={};
function mkKey(name,label,cls){
  const d=document.createElement('div');
  d.className='key'+(cls?' '+cls:''); d.textContent=label;
  const m=MAP[name]; if(m) d.style.setProperty('--c',FAM[m.fam].c);
  d.addEventListener('pointerdown',e=>{e.preventDefault();arm();fire(name);});
  keyEls[name]=d; return d;
}
function row(children){const r=document.createElement('div');r.className='row';children.forEach(c=>r.appendChild(c));kb.appendChild(r);}
row([...'1234567890'].map(k=>mkKey(k,k)).concat([mkKey('-','-'),mkKey('=','=')]));
row([mkKey('TAB','TAB','wide')].concat([...'QWERTYUIOP'].map(k=>mkKey(k,k))));
row([...'ASDFGHJKL'].map(k=>mkKey(k,k)).concat([mkKey(';',';'),mkKey("'","'")]));
row([mkKey('SHIFT','SHIFT','wide')].concat([...'ZXCVBNM'].map(k=>mkKey(k,k)))
   .concat([mkKey(',',','),mkKey('.','.'),mkKey('/','/')]));
row([mkKey('BACKSPACE','⌫','wide'),mkKey(' ','SPACE','space'),mkKey('ENTER','ENTER','wide'),
     mkKey('ARROWLEFT','←'),mkKey('ARROWDOWN','↓'),mkKey('ARROWUP','↑'),mkKey('ARROWRIGHT','→')]);

el('legend').innerHTML=Object.keys(FAM).map(k=>
  `<span><i style="background:${FAM[k].c}"></i>${FAM[k].name}</span>`).join('');

function flashKey(name,c){
  const d=keyEls[name]; if(!d) return;
  d.classList.remove('hit'); void d.offsetWidth; d.classList.add('hit');
  clearTimeout(d._t); d._t=setTimeout(()=>d.classList.remove('hit'),110);
}

/* ============================================================
   7. INPUT
   ============================================================ */
function arm(){ if(armed)return; audio(); armed=true; }
addEventListener('keydown',e=>{
  if(e.metaKey||e.ctrlKey||e.altKey) return;
  const k=normKey(e);
  if(k===' '||k==='TAB'||k==='BACKSPACE'||k.startsWith('ARROW')||k==='ENTER') e.preventDefault();
  arm();
  if(k==='R'&&e.shiftKey){reload();return;}
  fire(k);
});
addEventListener('pointerdown',arm,{once:true});

el('muteBtn').addEventListener('click',e=>{
  e.stopPropagation(); muted=!muted;
  e.target.textContent='SOUND: '+(muted?'OFF':'ON');
  if(master) master.gain.value=muted?0:volume;
});
el('vol').addEventListener('input',e=>{
  e.stopPropagation(); volume=e.target.value/100;
  if(master&&!muted) master.gain.value=volume;
});
['pointerdown','click'].forEach(ev=>document.querySelector('.ctl').addEventListener(ev,e=>e.stopPropagation()));
setAmmo();
