import pywifi
import time

def connect_wifi(ssid, password):
    wifi = pywifi.PyWiFi()
    iface = wifi.interfaces()[0]
    iface.disconnect()

    # Відкрийте файл для читання
    with open('vendors.txt', 'r') as file:
        # Прочитайте дані з файлу і збережіть їх у список
        vendors_data = file.readlines()

    # Список ваших даних
    target_vendors = ['2Wire, Inc.', '3M', '360 Systems', '3COM', 'Accelerated Networks']

    # Перевірка кожного рядка з файлу
    for vendor in vendors_data:
        # Перевірте, чи знаходиться поточний рядок у списку ваших даних
        if vendor.strip() in target_vendors:
            print(f'Знайдено: {vendor.strip()}')
        else:
            print(f'Не знайдено: {vendor.strip()}')


    time.sleep(1)

    profile = pywifi.Profile()
    profile.ssid = ssid
    profile.auth = pywifi.const.AUTH_ALG_OPEN
    profile.akm.append(pywifi.const.AKM_TYPE_WPA2PSK)
    profile.cipher = pywifi.const.CIPHER_TYPE_CCMP
    profile.key = password

    iface.remove_all_network_profiles()
    tmp_profile = iface.add_network_profile(profile)

    iface.connect(tmp_profile)

    time.sleep(5)

    if iface.status() == pywifi.const.IFACE_CONNECTED:
        print("Успешно подключено к сети:", ssid)
    else:
        print("Не удалось подключиться к сети:", ssid)

# Замените 'Название_сети' на имя вашей Wi-Fi сети, и 'Ваш_пароль' на пароль сети
ssid = 'Название_сети'
password = 'Ваш_пароль'

connect_wifi(ssid, password)
