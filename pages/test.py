import sys
import json
import re
import requests

def ocr_space_file(filename, overlay=False, api_key='K88208119988957', language='eng'):
    payload = {'isOverlayRequired': overlay,
               'apikey': api_key,
               'language': language,
               }
    with open(filename, 'rb') as f:
        r = requests.post('https://api.ocr.space/parse/image',
                          files={filename: f},
                          data=payload,
                          )
    return r.content.decode()

# Main processing function
if __name__ == "__main__":
    image_path = sys.argv[1]  # The image path passed from PHP

    # Perform OCR on the uploaded image
    test_file = ocr_space_file(filename=image_path, language='eng')
    result = json.loads(test_file)

    # Extract specific fields using refined regular expressions
    if result['IsErroredOnProcessing'] == False:
        parsed_text = result['ParsedResults'][0]['ParsedText']

        id_number = re.search(r'\b(\d{4}-\d{4}-\d{4}-\d{4})\b', parsed_text)
        last_name = re.search(r'Apelyido/Last Name\s*([\w\s]+)', parsed_text)
        given_name = re.search(r'Mga Pangalan/Given Names\s*([\w\s]+)', parsed_text)
        dob = re.search(r'Petsa ng Kapanganakan/Date of Birth\s*([A-Za-z\s\'0-9,]+)', parsed_text)
        address = re.search(r'Tirahan/Address\s*([\w\s,]+)', parsed_text)
        middle_name = re.search(r'Gitnang Apelyido/Middle Name\s*([\w\s]+)', parsed_text)

        # Prepare the data to send back to PHP
        data_to_return = {
            'id_number': id_number.group(1).strip() if id_number else '',
            'last_name': last_name.group(1).strip() if last_name else '',
            'given_name': given_name.group(1).strip() if given_name else '',
            'dob': dob.group(1).strip() if dob else '',
            'address': address.group(1).strip() if address else '',
            'middle_name': middle_name.group(1).strip() if middle_name else ''
        }

        # Print the JSON encoded data
        print(json.dumps(data_to_return))
    else:
        print(json.dumps({"error": "OCR processing failed"}))
