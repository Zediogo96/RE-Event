from ast import pattern
from lib2to3.pgen2.token import NUMBER
from random import randint, random
from datetime import date, datetime, time
import hashlib
import string
import secrets

from attr import has

""" print("---------------------")

countries = ["Bahrain", "Saudi Arabia", "Australia", "Italy", "United States", "Monaco", "Azerbaijan", "Canada", "Great Britain", "Portugal"]

for idx, x in enumerate(countries):
  print(f"INSERT INTO country (countryID, name) VALUES ({idx + 1}, '{x}');")

print("---------------------")

cities = ["Manama", "Jeddah", "Melbourne", "Milan", "Austin", "Monte Carlo", "Baku", "Montreal", "Silverstone", "Portimão"]

for idx, x in enumerate(cities):
  print(f"INSERT INTO city (cityID, name, countryID) VALUES ({idx + 1}, '{x}', {idx + 1});")


print("---------------------")

tags_name = ["music", "visual-arts", "film", "fashion", "cooking", "charities", "sports", "nightlife", "family", "books"]
tags_symbol = ["MSC", "VA", "FLM", "FSH", "COK", "CHR", "SPO", "NGT", "FAM", "BOK"]

for i in range(len(tags_name)):
  print(f"INSERT INTO tag (tagID, name, symbol) VALUES ({i + 1}, '{tags_name[i]}', '{tags_symbol[i]}');")
 """

print("--------- REVIEWS ------------")

for i in range(10):
  print(f"INSERT INTO review (rating, userID, eventID) VALUES ({randint(0,5)}, {i}, {i});")

print("--------- INVITED -----------")

status = ["FALSE", "TRUE"]

for i in range(20):
  print(f"INSERT INTO invited (status, userID, eventID) VALUES ({status[randint(0,1)]}, {randint(1,10)}, {randint(1,10)});")

print("----------- USERS ----------")

mail = ["hotmail.com", "gmail.com", "yahoo.pt"]
first_names = ["Adam", "Alex", "Aaron", "Ben", "Carl", "Dan", "David", "Edward", "Fred", "Frank", "George", "Hal", "Hank", "Ike", "John", "Jack", "Joe", "Larry", "Monte", "Matthew", "Mark", "Nathan", "Otto", "Paul", "Peter", "Roger", "Roger", "Steve", "Thomas", "Tim", "Ty", "Victor", "Walter"]
last_names = ["Anderson", "Ashwoon", "Aikin", "Bateman", "Bongard", "Bowers", "Boyd", "Cannon", "Cast", "Deitz", "Dewalt", "Ebner", "Frick", "Hancock", "Haworth", "Hesch", "Hoffman", "Kassing", "Knutson", "Lawless", "Lawicki", "Mccord", "McCormack", "Miller", "Myers", "Nugent", "Ortiz", "Orwig", "Ory", "Paiser", "Pak", "Pettigrew", "Quinn", "Quizoz", "Ramachandran", "Resnick", "Sagar", "Schickowski", "Schiebel", "Sellon", "Severson", "Shaffer", "Solberg", "Soloman", "Sonderling", "Soukup", "Soulis", "Stahl", "Sweeney", "Tandy", "Trebil", "Trusela", "Trussel", "Turco", "Uddin", "Uflan", "Ulrich", "Upson", "Vader", "Vail", "Valente", "Van Zandt", "Vanderpoel", "Ventotla", "Vogal", "Wagle", "Wagner", "Wakefield", "Weinstein", "Weiss", "Woo", "Yang", "Yates", "Yocum", "Zeaser", "Zeller", "Ziegler", "Bauer", "Baxster", "Casal", "Cataldi", "Caswell", "Celedon", "Chambers", "Chapman", "Christensen", "Darnell", "Davidson", "Davis", "DeLorenzo", "Dinkins", "Doran", "Dugelman", "Dugan", "Duffman", "Eastman", "Ferro", "Ferry", "Fletcher", "Fietzer", "Hylan", "Hydinger", "Illingsworth", "Ingram", "Irwin", "Jagtap", "Jenson", "Johnson", "Johnsen", "Jones", "Jurgenson", "Kalleg", "Kaskel", "Keller", "Leisinger", "LePage", "Lewis", "Linde", "Lulloff", "Maki", "Martin", "McGinnis", "Mills", "Moody", "Moore", "Napier", "Nelson", "Norquist", "Nuttle", "Olson", "Ostrander", "Reamer", "Reardon", "Reyes", "Rice", "Ripka", "Roberts", "Rogers", "Root", "Sandstrom", "Sawyer", "Schlicht", "Schmitt", "Schwager", "Schutz", "Schuster", "Tapia", "Thompson", "Tiernan", "Tisler"]
gender = ["M", "F", "O"]

# CREATE ADMINS -> DO IT MANUALLY

# CREATE REGULAR USERS
for i in range(46):

  # get random string of letters and digits
  password = ''.join((secrets.choice(string.ascii_letters + string.digits + string.punctuation) for i in range(8)))

  name = first_names[randint(0, len(first_names) - 1)] + " " + last_names[randint(0, len(first_names) - 1)]
  email = first_names[randint(0, len(first_names) - 1)] + "_" + last_names[randint(0, len(first_names) - 1)][:3] + str(randint(70, 99)) + "@" + mail[randint(0, len(mail) - 1)]
  date = str(randint(2020, 2022)) + "/" + str(randint(1, 12)) + "/" + str(randint(1, 30))
  g = gender[randint(0,2)]
  p = "assets/user_profile_photos/" + str(i+5) + ".jpg"
  pw = hashed_string = hashlib.sha256(password.encode('utf-8')).hexdigest()
  print(f"INSERT INTO user_ (userID, name, email, birthDate, password, gender, profilePic, admin) VALUES ({i+5}, '{name}', '{email}', '{date}', '{pw}', '{g}', '{p}', {False});")

print(password)

print("----------- EVENT HOSTS ----------")
for i in range(10):
  print(f"INSERT INTO event_host (userID, eventID) VALUES ({i + 1}, {i + 1});")

print("----------- REPORTS ----------")

reasons = ["Dangerous/Illegal", "Discriminatory", "Misinformation", "Disrespectful", "Other"]
description = ["I just felt attacked by this comment!", "Very aggressive behaviour", "WTF!", "Thats kinda racist!", "LOL, cant believe he said that", "This user has been doing homophobic comments"]

today = datetime.today().strftime("%d/%m/%Y")
now = datetime.now().strftime("%H:%M")

for i in range(30):
  print(f"INSERT INTO report (reason, description, date, time, userID, eventID, commentID) VALUES ('{reasons[randint(0, len(reasons) - 1)]}', '{description[randint(0, len(description) - 1)]}',{today},{now},{i+1},{i+1},{i+1});")

print("----------- EVENT PHOTOS ----------")
for i in range(31):
  p = "event_photos/" + str(i+1) + ".jpg"
  print(f"INSERT INTO photo (photoID, path, eventID) VALUES ({i+1}, {p}', {i+1});")


print("----------- COMMENTS ----------")
for i in range(20): 
  c = ["Cant wait for it!", "This artist is just thrash", "So excited!", "Just cant believe!!", "A dream come true.", "Price is too high", "Too bad the prices are like this!", "I feel like this pushes too many agenda", "Too political, LOL", "NOPE LOL", "Too bad I cant go"]
  cm = c[randint(0, len(c) - 1)]
  d = str(randint(2020, 2022)) + "/" + str(randint(1, 12)) + "/" + str(randint(1, 30))
  t = str(randint(0, 23)) + ":" + str(randint(0,59))
  print(f"INSERT INTO comment (commentID, text, date, time, userID, eventID) VALUES ({i+1}, '{cm}', '{d}', '{t}', {i+1}, {randint(1,8)});")

print("----------- TICKETS ----------")

names = ["F1 STC Saudi Arabian Grand Prix 2022", "F1 Heineken Australian Grand Prix 2022", "Coldplay", "F1 Rolex Gran Premio del Made in Italy 2022", "Slipknot", "Arctic Monkeys", "Metallica", "F1 1 CRYPTO.COM Miami Grand Prix 2022", "Websummit Lisbon 2022", "Jogo Porto-Benfica"]


for i in range(10):
  capacity = "_" + str(randint(1,500)) +"_"
  number = "$" + str(i) + "$"
  n = names[i]
  s = number + n + capacity + n
  hashed = hashed_string = hashlib.sha256(s.encode('utf-8')).hexdigest()
  print(f"INSERT INTO ticket (qr_genstring, userID, eventID) VALUES ({hashed}, {i+1},{i+1});")

for i in range(30):
  evts = ["F1 STC Saudi Arabian Grand Prix 2022", "F1 Heineken Australian Grand Prix 2022", "Coldplay", "F1 Rolex Gran Premio del Made in Italy 2022", "Slipknot", "Arctic Monkeys", "Metallica", "F1 1 CRYPTO.COM Miami Grand Prix 2022", "Websummit Lisbon 2022", "Jogo Porto-Benfica"]
  cit = [2  ]
  cities = ["Manama", "Jeddah", "Melbourne", "Milan", "Austin", "Monte Carlo", "Baku", "Montreal", "Silverstone", "Portimão"]
  countries = ["Bahrain", "Saudi Arabia", "Australia", "Italy", "United States", "Monaco", "Azerbaijan", "Canada", "Great Britain", "Portugal"]
  


