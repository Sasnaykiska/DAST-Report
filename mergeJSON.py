import json
import os
import sys

def load_json_files(directory):
    combined_data = []
    for root, _, files in os.walk(directory):
        for filename in files:
            if filename.endswith('.json'):
                file_path = os.path.join(root, filename)
                try:
                    with open(file_path, 'r', encoding='utf-8') as file:
                        data = json.load(file)  # Загружаем JSON содержимое файла
                        if isinstance(data, list):
                            combined_data.extend(data)
                        else:
                            combined_data.append(data)
 
                except json.JSONDecodeError as e:
                    print(f"Ошибка декодирования JSON в файле {file_path}: {e}")
                except Exception as e:
                    print(f"Ошибка при обработке файла {file_path}: {e}")
    return combined_data

directory_path = sys.argv[1]
all_data = load_json_files(directory_path)
with open("jsonForArchive_" + directory_path + ".json", 'w', encoding='utf-8') as output_file:
    json.dump(all_data, output_file, ensure_ascii=False, indent=4)
