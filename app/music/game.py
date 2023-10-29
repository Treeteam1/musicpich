import random as rnd
def start():
    Level = int(1)
    HP = float(0)
    MP = float(0)
    Damage = float(0)
    Def = float(0)
    Crit_Rate = float(0)
    abilities_character = list()
    abilities_list = list()
    while True:
        try:
            abilities_character.clear()
            print("\n\n\nВиберіть клас персонажа: ")
            print("- Воїн")
            print("- Чарівник")
            print("- Лікар")
            print("- Вбивця")
            class_character = str(input('Зробіть ваш вибір: '))
            if class_character.lower() == 'воїн':
                HP = 10                
                MP = 4                
                Damage = 3                
                Def = 3                
                Crit_Rate = 10                
                abilities_list.append('Сильний удар мечем')
                abilities_list.append('Критичний стан')
                abilities_list.append('Посилиний захист')
                abilities_list.append('Стан')
                for i in range(0, 2):
                    ability = abilities_list[rnd.randint(0, len(abilities_list)-1)]
                    if ability in abilities_character:
                        i -= 1                    
                    else:
                        abilities_character.append(ability)
                print(abilities_character)
                break            
            elif class_character.lower() == 'чарівник':
                HP = 6                
                MP = 4                
                Damage = 6                
                Def = 3                
                Crit_Rate = 20                
                abilities_list.append('Допоміжні чарівники')
                abilities_list.append('Блискавка')
                abilities_list.append('Землетрус')
                for i in range(0, 2):
                    ability = abilities_list[rnd.randint(0, len(abilities_list)-1)]
                    if ability in abilities_character:
                        i -= 1
                    else:
                        abilities_character.append(ability)
                print(abilities_character)
                break                        
            elif class_character.lower() == 'лікар':
                HP = 12                
                MP = 4                
                Damage = 4                
                Def = 5                
                Crit_Rate = 17               
                abilities_list.append('Інгалятор')
                abilities_list.append('Мед сестра')
                abilities_list.append('Отрута')
                for i in range(0, 2):
                    ability = abilities_list[rnd.randint(0, len(abilities_list)-1)]
                    if ability in abilities_character:
                        i -= 1                    
                    else:
                        abilities_character.append(ability)
                print(abilities_character)
                break                                    
            elif class_character.lower() == 'вбивця':
                HP = 7                
                MP = 4                
                Damage = 7                
                Def = 8               
                Crit_Rate = 12                
                abilities_list.append('Сокира')
                abilities_list.append('Вовк')
                abilities_list.append('Затемнення')
                for i in range(0, 2):
                    ability = abilities_list[rnd.randint(0, len(abilities_list)-1)]
                    if ability in abilities_character:
                        i -= 1                    
                    else:
                        abilities_character.append(ability)
                print(abilities_character)
                break                                    
            else:
                raise Exception('Невідомий клас! Повторіть спробу!')
        except Exception as e:
            print(e)
    game_process(HP, MP, Damage, Def, Crit_Rate, abilities_character, class_character)

def game_process(HP, MP, Damage, Def, Crit_Rate, abilities_character, class_character):
    start = False    
    e_Level = 1    
    e_HP = 0    
    e_MP = 0    
    e_Damage = 0    
    e_Def = 0    
    e_Crit_Rate = 0    
    list_enemy = ['Гоблін', 'Троль', 'Слізь', 'Кацап']
    for i in range(0, 3):
        enemy_name = str(list_enemy[rnd.randint(0, len(list_enemy)-1)])
        if enemy_name.lower() == 'гоблін':
            e_HP = 6            
            e_MP = 4            
            e_Damage = 2            
            e_Def = 0            
            e_Crit_Rate = 5        
        elif enemy_name.lower() == 'троль':
            e_HP = 6            
            e_MP = 4            
            e_Damage = 2            
            e_Def = 0            
            e_Crit_Rate = 5        
        elif enemy_name.lower() == 'слізь':
            e_HP = 6            
            e_MP = 2
            e_Damage = 1
            e_Def = 10            
            e_Crit_Rate = 10        
        elif enemy_name.lower() == 'кацап':
            e_HP = 2            
            e_MP = 2            
            e_Damage = 1            
            e_Def = 1            
            e_Crit_Rate = 0        
        start = bool(rnd.randint(0, 2))
        print(f"\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tХвиля [№{i+1}]")
        if i >= 3: e_Level + 1
        print(f"\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tРівень [№{e_Level}]")
        while True:
            print("~~~~ Інформація про ворога ~~~~~~~~~~~~~~~~~~ Статус персонажа ~~~~~~~~~~~~~~~~")
            print(f"Назва: {enemy_name}\t\t\t|\tКлас: {class_character}")
            print(f"HP: {e_HP}\t\t\t\t|\tHP: {HP}")
            print(f"Damage: {e_Damage}\t\t\t|\tMP: {MP}")
            print(f"Def: {e_Def}\t\t\t\t|\tDamage: {Damage}")
            print(f"\t\t\t\t|\tCrit Rate: {Crit_Rate*2}")
            print(f"\t\t\t\t|\tЗдібності: {abilities_character}")
            print("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n")
            if start == True: #user                
                print('Ваш хід: \n')
                print("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n")
                input()
                start = False                
                result_damege_by_user = Damage + (Damage*Crit_Rate/100)
                if result_damege_by_user > e_Def:
                    current_damage = result_damege_by_user - e_Def                    
                    e_Def = 0                    
                    e_HP -= current_damage                    
                    if e_HP < 0:
                        e_HP = 0                        
                        print(f"\n\n\n\n\n\nВи вбили {enemy_name}!")
                        break                
                    else:
                        e_Def -= result_damege_by_user            
            else: #enemy                
                start = True                
                result_damege_by_enemy = e_Damage + (e_Damage*e_Crit_Rate/100)
                if result_damege_by_enemy > Def:
                    current_damage = result_damege_by_enemy - Def                    
                    Def = 0                    
                    HP -= current_damage                    
                    if HP < 0:
                        HP = 0                        
                        print("Вас вбили! Кінець гри!")
                        break                        
                        end()
                else:
                    Def -= result_damege_by_enemy        
            input()
def end():
    print('Exit')
    
if __name__ == "__main__":
    try:
        start()
    except Exception as e:
        print(e)