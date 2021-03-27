from telegram import ReplyKeyboardMarkup,InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import MessageHandler, CommandHandler, Updater, CallbackQueryHandler, Filters
import telebot
from telebot import types
	
	
buttons = [
    [
        InlineKeyboardButton("🔺Gruppaga🚹Qo'shish➕",url ='http://telegram.me/Moxinura_bot?startgroup=new'),
        
    ], 
    [
        InlineKeyboardButton("BOT funkisyalari",callback_data='xususiyat'),
   
    ],
    [InlineKeyboardButton('🧑🏻‍💻DASTURCHI👨🏼‍💻',callback_data='dasturchi')],
    [	
    	InlineKeyboardButton('🤖BOT🧮STATISTIKA👁‍🗨',callback_data='statt'),
    	InlineKeyboardButton('📝Reklama🤟bo\'yicha💣',callback_data='Reklamaberish')
    ]
]
tarjiman_knopka= [

[
	InlineKeyboardButton("📃TARJIMON🉐BOT📖",url = 'http://telegram.me/testqilish12bot')
],


]		
def start(update,context):
    text = "🖐🏻Assalom alaykum,🖐🏼{}\n🏳️gruppalarda😍suhbatlashishni🥰 qiyvoradigan👩‍🦰botga👱‍♀xush kelibsiz!\n pastdagi tugmalar siz uchun👇🏻👇🏻."
    update.message.reply_html(text.format(update.message.from_user.first_name),reply_markup=InlineKeyboardMarkup(buttons))
    

# 	faylnomi = 'userlar.txt'
# with open(faylnomi,'a') as fayl:
#     fayl.write(from_user.id + '\n')
def inline_button(update,context):
    query = update.callback_query
    q_d = query.data
    if q_d == 'dasturchi':
        query.message.reply_text('🧑🏻‍💻DASTURCHI👨🏼‍💻: @Hudoga_shukur_deyman\nsizga istalgan botinggizni yasab beramiz\nNarxlari esa yasaladigan bot turiga bog\'liq')
    elif q_d == 'Reklamaberish':
        query.message.reply_text('👮Bot admini va reklama bo\'yicha: @Hudoga_shukur_deyman \n☎️ Telefon: +998903215497\n\n⏳ Ish Vaqti: 12:00 - 24:00\nNARXLARI BOT STATISTIKASIGA BOG\'LIQ')
    elif q_d == 'statt':
        query.message.reply_text(f'📊Bot foydalanuvchilari:\n\n🌎 Hammasi: 12106\n├👤: 9465\n└👥: 2641\n\n👤 - Foydalanuvchilar\n👥 - Guruhlar')
    elif q_d == 'xususiyat':
        query.message.reply_text(f"BOTning vazifalari faqat guruhinggizga admin qilgach ishlaydi \n1 o'zbekcha va arabcha reklamalarni, ssilkalani guruhlarda ochirib beradi👨🏻‍✈\n2 SUPER QOBILIYATI HAR HAFTA SIZ QO'SHGAN GURUHGA 150ta ODAM qo'shadi.\nIshonmasanggiz sinab ko'RING Agar yoqmasa yana chiqarib tashaysiz .\n3 JUDA MUKAMMAL TARZDA SUHBATLASHADI\n 4 BOT sizga kerakli barcha so'z yoki gaplarni tarjima qilib beradi buni uchun \n/TARJIMA ni bosing\n5 BOT HAR 4 KUNDA GURUH A'ZOLARIGA OB-havo haqida XABAR beradi(7kunlik) 6 BOTDAGI MALUMOTLAR HAR KUNI YANGILANADI")

# def yuborish(message):
# 	user_yuborgan_satr = message.text.lower()
# 	if 'salom' in user_yuborgan_satr:
#             bot.reply_to(message,"salom nima gaplar") 
# 	elif 'musiqa' in user_yuborgan_satr: 
# 			bot.reply_to(message,"musiqami??\nhttps://youtu.be/bKDdT_nyP54")
# #################################
# 	elif 'kimlar bor' == user_yuborgan_satr:
#             bot.reply_to(message,'siz va men')
#             bot.send_message(message.chat.id,"o'zi siz kirsanggiz boshqalar bo'maydi boshqala kirsa siz")
 
#chaaaaaaaattttttttttttttt  boshlandi !!!!
def answer(update,context):
    user_yuborgan_satr = update.message.text.lower()
    if 'salom' in user_yuborgan_satr:
        update.message.reply_text('Salom, nima gap ???')
    elif 'kimlar bor' in user_yuborgan_satr:
        update.message.reply_text('o\'zi siz kirsanggiz boshqalar bo\'maydi boshqala kirsa siz')
    elif 'xxx' in user_yuborgan_satr:
        update.message.reply_text('E bas qilinggi😡')
    elif 'hech kim yo\'q' in user_yuborgan_satr:
        update.message.reply_text('men shuttaman')
    elif 'hmm' in user_yuborgan_satr:
        update.message.reply_text('bug\'izlanggan molday xmmmiylaykan🤪😁😆\n(Hazil)')
    elif 'qalaysiz' in user_yuborgan_satr:
        update.message.reply_text('Qalay emas oltinman😁')
    elif 'toshkent' in user_yuborgan_satr:
        update.message.reply_text('E tasadifni qarang men ham toshkentdanman😍')
    elif 'qizlar bormi' in user_yuborgan_satr:
        update.message.reply_text('E bas qilinggi😡')
    elif "odam qo'shing" in user_yuborgan_satr:
        update.message.reply_text('meni gruppanggizga qo\'shing sal kam odamman😂😁')
    elif "qales" in user_yuborgan_satr:
        update.message.reply_text('zakonni😁')
    elif 'savaman' in user_yuborgan_satr:
        update.message.reply_text('Mengamidi bu ?😍')
    elif 'bot ku' in user_yuborgan_satr:
        update.message.reply_text('Bot bo\'lsam ham sizdan yaxshi yozaman')
    elif '2004' in user_yuborgan_satr:
        update.message.reply_text('e tasodifni qarang men ham 2004-yilman😂😁')
    elif 'zerik' in user_yuborgan_satr:
        update.message.reply_text('Ha😍menda ham shu')
    elif 'bu botku' in user_yuborgan_satr:
        update.message.reply_text('siz aytmasanggiz bilmas ekanmize sizga hammamizzi qoyilimiz')
    elif 'kim qo\'shdi' in user_yuborgan_satr:
        update.message.reply_text('😍menda')
    elif 'navoiy' in user_yuborgan_satr:
        update.message.reply_text('meni yaratgan dasturchi ham Navoiylik')
						# elif 'aloo' in user_yuborgan_satr:
					 #       	update.message.reply_html('DA eshitaman') 
					 #    elif'nechinchi yilsiz' in user_yuborgan_satr:
					 #    	update.message.reply_html("men endi odammasmanku shu uchun indamay o'tiray-a😂😁😜")
					 #    elif 'kimsan' in user_yuborgan_satr:
					 #        update.message.reply_html('i am for telegram echo botn\n(ana inglizchalab ham gapiraman😂😁😜)')  
					 #    elif "zo'r" in user_yuborgan_satr:
					 #    	update.message.reply_html("har doim shunday bo'lsin🥰😘")
					 #    elif 'kimlar bo' in user_yuborgan_satr:
					 #        update.message.reply_text("o'zi siz kirsanggiz boshqalar bo'maydi boshqala kirsa siz")
					    

def video_xabar_kelsa(update,poxxxx):
    update.message.reply_text('Qanaqa video bu? narmalnemi😁😜')
def stikeruchun(update,xabarda_karochi):
    update.message.reply_text('iltimos boshqa stiker tashab\nyosh bolaga o\'xshamang')
def ovozli_xabar_tashasa(update,ozli):
    update.message.reply_text('ovoziz xuddi odamlarni ovoziga o\'xshaykan😅🤣😂🤪')
def gps_tashasa(update,manziliii):
    update.message.reply_text('GPS manzilku bu dugonalarimnikini🥰😘beraymi\nshundo lechkamga yozvoring😜')

def tajimonlik(update,context):
    msg = update.message.text
    text = "Sizga HAQIQIY tarjimon kerak bo'lsa bizning botga tashrif buyuring!"
    update.message.reply_html(text.format(update.message.from_user.first_name),reply_markup=InlineKeyboardMarkup(tarjiman_knopka))


#chaaaatttttttt tugadi !!!!!!!!!1

updater = Updater("1652807613:AAHZqvx2-_COOBIcHmFVSvHLB9Z7ygsWq4k")
## KAMANDALAR TURLARI
updater.dispatcher.add_handler(CommandHandler('start',start)) 
updater.dispatcher.add_handler(CommandHandler('tarjima',tajimonlik)) 

## XABAR TURLARIII
updater.dispatcher.add_handler(MessageHandler(Filters.text,answer))

updater.dispatcher.add_handler(MessageHandler(Filters.video, video_xabar_kelsa))

updater.dispatcher.add_handler(MessageHandler(Filters.voice, ovozli_xabar_tashasa)) 

updater.dispatcher.add_handler(MessageHandler(Filters.location, gps_tashasa)) 


updater.dispatcher.add_handler(CallbackQueryHandler(inline_button))


updater.start_polling()
updater.idle()