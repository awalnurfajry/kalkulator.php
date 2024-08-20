<!DOCTYPE html>
<html>
<head>
  <title>Kalkulator</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f0f0f0;
    }

    .calculator {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }

    .display {
      background-color: #eee;
      padding: 25px;
      border-radius: 5px;
      text-align: right;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .buttons {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 10px;
    }

    button {
      padding: 15px;
      border: none;
      border-radius: 15px;
      background-color: #ddd;
      font-size: 30px;
      cursor: pointer;
    }

    button:hover {
      background-color: #ccc;
    }

    .operator {
      background-color: #f08080;
    }

    .equal {
      background-color: #4CAF50;
      color: #fff;
    }

    .delete {
      background-color: #ff9999;
    }
  </style>
</head>
<body>

  <div class="calculator">
    <div class="display" id="display">0</div>
    <div class="buttons">
      <button class="delete" onclick="deleteLastChar()">C</button>
      <button onclick="appendNumber('7')">7</button>
      <button onclick="appendNumber('8')">8</button>
      <button onclick="appendNumber('9')">9</button>
      <button class="operator" onclick="appendOperator('/')">/</button>
      <button onclick="appendNumber('4')">4</button>
      <button onclick="appendNumber('5')">5</button>
      <button onclick="appendNumber('6')">6</button>
      <button class="operator" onclick="appendOperator('x')">x</button>
      <button onclick="appendNumber('1')">1</button>
      <button onclick="appendNumber('2')">2</button>
      <button onclick="appendNumber('3')">3</button>
      <button class="operator" onclick="appendOperator('-')">-</button>
      <button onclick="appendNumber('0')">0</button>
      <button onclick="appendNumber('00')">00</button>
      <button onclick="appendNumber('.')">.</button>
      <button class="operator" onclick="appendOperator('+')">+</button>
      <button class="equal" onclick="calculate()">=</button>
     
    </div>
  </div>

  <script>
    let display = document.getElementById('display');
    let operator = null;
    let previousOperand = null;

    function appendNumber(number) {
      if (display.textContent === '0') {
        display.textContent = number;
      } else {
        display.textContent += number;
      }
    }

    function appendOperator(op) {
      operator = op;
      previousOperand = parseFloat(display.textContent);
      display.textContent += op;
    }

    function deleteLastChar() {
      let text = display.textContent;
      display.textContent = text.substring(0, text.length - 1);
      if (display.textContent === '') {
        display.textContent = '0';
      }
    }

    function calculate() {
      let currentOperand = parseFloat(display.textContent.substring(display.textContent.lastIndexOf(operator) + 1));
      let result;

      switch (operator) {
        case '+':
          result = previousOperand + currentOperand;
          break;
        case '-':
          result = previousOperand - currentOperand;
          break;
        case 'x':
          result = previousOperand * currentOperand;
          break;
        case '/':
          result = previousOperand / currentOperand;
          break;
      }

      display.textContent = result;
      operator = null;
      previousOperand = null;
    }
  </script>

</body>
</html>