# elk-stop-spammer
Blocks spam registrations by checking nickname, IP, and e-mail against the "Stop Forum Spam" DB.

The first and best defense against spam available in Elkarte is to enable Bad Behavior coupled with the Project Honey Pot http:BL. You can enable Bad Behavior in your administration interface under Configuration ⇒ Security and Moderation ⇒ Bad Behavior, where you can also enable checking against the Project Honey Pot database by adding a http:BL API Key. This will prevent the vast majority of spammers from even as much as browsing your sites, where they waste CPU, bandwidth, and can collect information like usernames insofar as they can be publicly viewed.

Stop Spammer jumps in when a spammer manages to get past this enormously effective line of defense by checking their registration attempt against the Stop Forum Spam database. Only malicious bots that try to spam either through posts or profiles will do this in the first place, so enabling Bad Behavior is quite important.
