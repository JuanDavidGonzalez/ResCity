
import threading
import logging
import time
import json
import mysql.connector

from kafka import KafkaConsumer

mydb = mysql.connector.connect(host="10.97.0.252",user="root",passwd="password")
mycursor = mydb.cursor()
mycursor.execute("USE base1")
sql = "INSERT INTO tweets (hashtag, count, date) VALUES (%s, %s, %s)"

def send_to_db(row):
	val = (row[0], row[1], row[2])
	mycursor.execute(sql, val)
	mydb.commit()
	print ('Dato almacenado en la DB')

class Consumer(threading.Thread):
	daemon = True
	def run(self):
		consumer = KafkaConsumer('tweets_spark_out',
							   bootstrap_servers='10.96.160.223:9092',
							   auto_offset_reset='earliest',
							   consumer_timeout_ms=1000)

		consumer.subscribe(['tweets_spark_out'])
			for message in consumer:
				msn = str(message.value).).rsplit(",")
                  send_to_db(msn)
                  print (msn)


def main():
	threads = [
		Consumer()
	]
	for t in threads:
		t.start()

	time.sleep(10)

if __name__ == "__main__":
	logging.basicConfig(
		format='%(asctime)s.%(msecs)s:%(name)s:%(thread)d:' +
	            '%(levelname)s:%(process)d:%(message)s',
	     level=logging.INFO
     )
     main()
